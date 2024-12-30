# PHP2Tailwind

Hi everyone!

I recently encountered a challenge when I started using Tailwind CSS in a PHP project. I needed to generate an optimized build for production, but the process wasn’t straightforward. Instead of diving into existing solutions, I created a simple script to address this problem. This script generates a `output.css` file, which you can seamlessly integrate into your PHP project.

## What Does It Do?

The script processes your PHP files, creates corresponding HTML mirrors, and builds a production-ready Tailwind CSS `output.css` file. This is particularly useful for PHP projects where integrating Tailwind’s build tools directly may be cumbersome.

## Instructions

### Prerequisites
Ensure you have the following installed on your system:
- Node.js
- npm (Node Package Manager)

### Steps to Use the Script

1. **Get the Script**:
   - Copy the code or download the `generate_mirror.php` file from this repository.

2. **Setup**:
   - Place the `generate_mirror.php` file in your project directory.
   - Edit the script to include the PHP files you want to process by adding their paths to the `$phpFiles` array.

3. **Run the Script**:
   - Open your terminal.
   - Navigate to the directory where the `generate_mirror.php` file is located.
   - Execute the script by running:
     ```bash
     php generate_mirror.php
     ```

4. **Wait for Completion**:
   - The script will create mirror HTML files and then build Tailwind’s `output.css`. This process might take a minute or two.

5. **Retrieve the CSS File**:
   - Navigate to the `mirror_html` folder.
   - Copy the generated `output.css` file and include it in your PHP project.

## Contributing

This script was written as a quick solution, and there’s always room for improvement. If you encounter any bugs or have suggestions, please create a pull request. Your contributions and feedback are highly valued and will help make this tool even better.

---

Peace,  
Muswalo

