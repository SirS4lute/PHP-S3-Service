# AWS S3 Integration with PHP

This project demonstrates a simple integration with AWS S3 using PHP. It provides a reusable `S3Service` class for uploading, downloading, and deleting files from an S3 bucket. An example controller (`S3ExampleController`) showcases how to use the service to perform file operations.

---

## 📂 Project Structure

```
/PHP-S3-Service
 ├── /src
 │    └── /App
 |         └── /Controllers
 │         |    └── S3ExampleController.php
 │         ├── /Services
 │              └── S3Service.php
 ├── .env
 ├── composer.json
 ├── composer.lock
 ├── index.php
 ├── .gitignore
 └── /vendor
```

---

## 🛠️ Requirements

- **PHP 8+**
- **Composer**
- AWS credentials with access to S3

---

## 🚀 Installation

1. Clone this repository and access it:
   ```bash
   git clone https://github.com/SirS4lute/PHP-S3-Service.git
   ```
   ```bash
   cd PHP-S3-Service
   ```

2. Install dependencies using Composer:
   ```bash
   composer install
   ```

3. Create a `.env` file in the project root, you can follow the .env.example:
   ```dotenv
   AWS_REGION=us-east-1
   AWS_VERSION=latest
   AWS_BUCKET_NAME=my-bucket
   AWS_ACCESS_KEY=fakeAccessKey123
   AWS_SECRET_KEY=fakeSecretKey456
   ```

4. Start the local server:
   ```bash
   php -S localhost:8000 index.php
   ```

---

## 🧪 Usage

1. Open the browser and navigate to:
   ```
   http://localhost:8000
   ```

2. The example controller will:
   - Create a local file.
   - Upload the file to S3.
   - Retrieve the file from S3 and display its contents.
   - Delete the file from S3.
   - Verify the file no longer exists in S3.

---

## 📝 Notes

- Make sure the bucket name in `.env` exists in your AWS account.

---

## 📜 License

This project is licensed under the MIT License. Feel free to use and modify it as needed.

---

## 📧 Contact

For questions or suggestions, please open an issue or reach out to the repository owner.
