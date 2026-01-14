#!/bin/bash

# Install mPDF for PDF Export Feature

echo "📦 Installing mPDF library for PDF export..."
echo ""

cd dashboard

# Check if composer is installed
if ! command -v composer &> /dev/null; then
    echo "⚠️  Composer not found!"
    echo ""
    echo "Option 1: Install Composer"
    echo "  Visit: https://getcomposer.org/download/"
    echo ""
    echo "Option 2: Use Browser Print-to-PDF"
    echo "  The export feature will work without mPDF using your browser's print function."
    echo ""
    exit 1
fi

# Install dependencies
composer install

if [ $? -eq 0 ]; then
    echo ""
    echo "✅ mPDF installed successfully!"
    echo ""
    echo "PDF export feature is now fully functional with direct PDF downloads."
else
    echo ""
    echo "❌ Installation failed!"
    echo ""
    echo "The export feature will still work using browser's Print-to-PDF."
fi
