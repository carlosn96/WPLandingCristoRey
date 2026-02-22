import os
import sys
from pathlib import Path
from dotenv import load_dotenv

from google import genai
from google.genai import types
from groq import Groq

# Cargar variables de entorno
env_path = Path(__file__).resolve().parent.parent.parent / ".env"
load_dotenv(dotenv_path=env_path)

WP_URL = os.getenv("WP_URL", "").rstrip("/")
WP_USER = os.getenv("WP_USER", "")
WP_APP_PASSWORD = os.getenv("WP_APP_PASSWORD", "")
GEMINI_API_KEY = os.getenv("GEMINI_API_KEY", "")
GROQ_API_KEY = os.getenv("GROQ_API_KEY", "")

if not GEMINI_API_KEY:
    print("⚠️ Warning: GEMINI_API_KEY no encontrado en .env")

if not GROQ_API_KEY:
    print("❌ Error: GROQ_API_KEY no encontrado en .env")
    sys.exit(1)

# Configurar clientes globalmente utilizables por api.py
client = genai.Client(api_key=GEMINI_API_KEY) if GEMINI_API_KEY else None
groq_client = Groq(api_key=GROQ_API_KEY)
