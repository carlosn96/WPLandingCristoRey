import json
import logging
import groq
from google.genai import types as genai_types
from google.genai import errors as genai_errors
from tenacity import retry, stop_after_attempt, wait_exponential, retry_if_exception_type
from config import client, groq_client
from prompts import SYSTEM_PROMPT_ANALYZE, SYSTEM_PROMPT_IMAGE

# Definir reglas de reintento para las llamadas a LLM (maneja errores transitorios)
retry_llm = retry(
    stop=stop_after_attempt(4),
    wait=wait_exponential(multiplier=1, min=2, max=10),
    retry=retry_if_exception_type((groq.InternalServerError, groq.APIConnectionError, groq.RateLimitError)),
    before_sleep=lambda retry_state: logging.warning(f"⏳ Error con Groq/LLM. Reintentando en {retry_state.next_action.sleep}s...")
)

@retry_llm
def run_llm_analysis(passage_text: str) -> dict:
    """Ejecuta el paso de Análisis Teológico con Groq (Llama 3.3 70b)."""
    print("🧠 Analizando el pasaje teológicamente con Groq (Llama 3.3 70b)...")
    
    chat_completion = groq_client.chat.completions.create(
        messages=[
            {"role": "system", "content": SYSTEM_PROMPT_ANALYZE},
            {"role": "user", "content": f"Analiza este pasaje:\n\n{passage_text}"}
        ],
        model="llama-3.3-70b-versatile",
        response_format={"type": "json_object"},
    )
    
    try:
        data = json.loads(chat_completion.choices[0].message.content)
        return data
    except Exception as e:
        print(f"❌ Error decodificando el JSON del análisis Groq: {e}")
        return None

@retry_llm
def run_image_prompt(passage_text: str, analysis: dict) -> str:
    """Genera el prompt cinematográfico usando Groq (Llama 3.1 8b)."""
    print("🎨 Generando el prompt fotográfico con Groq (Llama 3.1 8b)...")
    
    input_text = f"Evangelical Passage: {passage_text}\n\nTheological Analysis JSON: {json.dumps(analysis)}"
    
    chat_completion = groq_client.chat.completions.create(
        messages=[
            {"role": "system", "content": SYSTEM_PROMPT_IMAGE},
            {"role": "user", "content": input_text}
        ],
        model="llama-3.1-8b-instant",
    )
    return chat_completion.choices[0].message.content.strip()

def run_image_generation(prompt: str) -> bytes:
    """Genera la imagen usando Imagen vía Gemini API y retorna los bytes (Requiere Billing)."""
    if not client:
        return None
   
    model = "meta-llama/llama-4-scout-17b-16e-instruct"
    print(f"🌅 Intentando generar imagen con {model} (Gemini)...")
    try:
        response = client.models.generate_images(
            model=model,
            prompt=prompt,
            config=genai_types.GenerateImagesConfig(
                number_of_images=1,
                aspect_ratio="3:4", 
                output_mime_type="image/jpeg"
            )
        )
        if response.generated_images:
            return response.generated_images[0].image.image_bytes
    except Exception as e:
        print(f"⚠️ Error con {model}: {e}")
    return None
