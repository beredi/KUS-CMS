#!/bin/bash

# KUS-CMS Development Server Starter

PORT=8000

echo "🚀 Starting KUS-CMS Development Server..."
echo ""
echo "Server will be available at:"
echo "  👉 http://localhost:$PORT"
echo ""
echo "Press Ctrl+C to stop the server"
echo ""

php -S localhost:$PORT router.php
