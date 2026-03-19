#  PHP Comment Remover Tool

This project is a powerful and lightweight PHP utility created by **Ashikur Rahman Provat**. It is designed to clean your source code by automatically removing unnecessary comments from PHP, Blade, and JavaScript files.

### Streamline your codebase and prepare it for production with ease.
The PHP Comment Remover handles single-line, multi-line, and framework-specific comments (like Laravel Blade) using optimized Regular Expressions.
For more tools and web development services, visit **[arprovat.com](https://arprovat.com)**.

## Authors

![Logo](https://arprovat.com/assets/img/favicon.ico)
**[@DProvat](https://github.com/Provat-14)**

## Features

- ✅ **Multi-Language Support:** Works with PHP, JS, JSX, TS, TSX, and Vue files.
- ✅ **Blade Engine Support:** Specifically removes Laravel's `{{-- --}}` comments.
- ✅ **Recursive Scanning:** Automatically processes all sub-folders within a directory.
- ✅ **Single File Mode:** Option to clean a specific file instead of an entire project.
- ✅ **Regex Powered:** Fast and accurate removal of `//` and `/* */` patterns.

## Tech Stack

**Server:** PHP 8.x (Regex, RecursiveDirectoryIterator)

## How to Run

- You must have a PHP-supported environment (e.g., Laragon, XAMPP, or CLI).
- Clone the script or create a `tools.php` file in your project root.
- Set your target path (file or folder) at the bottom of the script:
```php
// For a specific file:
$inputPath = './test.php'; 

// For an entire directory:
$inputPath = './src'; 

processPath($inputPath);
```

### 3.Running the Tool
Open your terminal or command prompt and run:

```bash
 php tools.php
 ```


 ### 4.🛠 Tech Stack

- **Language:** PHP 8.x
- **Core Engine:** Regex (Regular Expressions)
- **Iterator:** RecursiveDirectoryIterator & RecursiveIteratorIterator
## ⚠️ Disclaimer

This tool directly overwrites your original files. It is **highly recommended** to perform a **Git Commit** or take a backup before running the script to avoid losing any critical documentation.

## Contributing

Contributions are welcome! If you'd like to improve the regex patterns or add more file support, feel free to fork the repository and submit a pull request.

## Contact

![Logo](https://arprovat.com/assets/img/favicon.ico)
If you encounter any issues or have suggestions for improvement, please [open an issue](https://github.com/Provat-14/php_comment_remover/issues/new) on GitHub.