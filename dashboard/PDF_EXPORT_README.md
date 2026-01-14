# PDF Export Feature - Installation Instructions

## Quick Setup

The PDF export feature works out-of-the-box using browser's Print-to-PDF functionality.

For better PDF generation (optional), install mPDF library:

### Option 1: Using Composer (Recommended)

```bash
cd dashboard
composer install
```

This will install mPDF library from the composer.json file.

### Option 2: Using Install Script

```bash
cd ..  # Go back to project root
./scripts/install-pdf-export.sh
```

### Option 3: Manual Installation

If you don't have Composer:

1. Download mPDF from: https://github.com/mpdf/mpdf/releases
2. Extract to `dashboard/vendor/mpdf/mpdf/`
3. Include autoload: `require_once 'vendor/autoload.php';`

## Features

- ✅ Filter posts by date range (from/to)
- ✅ Export all posts or filtered selection
- ✅ Includes post images embedded in PDF
- ✅ Professional PDF design matching KUS branding
- ✅ Posts ordered by date (newest first)
- ✅ Shows post status (Published/Draft)
- ✅ Author and date information

## Usage

1. Go to Dashboard → Posts → Všetky články
2. Click "Export do PDF" button
3. Select date range (optional)
4. Click "Exportovať PDF"
5. Browser will open print dialog or download PDF (depending on mPDF availability)

## Browser Print-to-PDF

If mPDF is not installed, the system automatically uses browser's built-in print-to-PDF:

1. Click "Tlačiť / Uložiť ako PDF" button
2. In print dialog, select "Save as PDF"
3. Choose destination and save

## Troubleshooting

**Images not showing in PDF:**

- Check that images exist in `/images/articles/` folder
- Ensure proper file permissions

**PDF not downloading:**

- Check PHP memory limit in php.ini (`memory_limit = 256M`)
- For large exports, increase `max_execution_time`

**mPDF errors:**

- Run `composer update` in dashboard folder
- Check vendor folder exists: `dashboard/vendor/`
