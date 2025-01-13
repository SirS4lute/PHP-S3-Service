// New class that utilizes S3Service
namespace App\Controllers;

use App\Services\S3Service;

class S3ExampleController
{
    private S3Service $s3Service;

    public function __construct()
    {
        $region = getenv('AWS_REGION');
        $version = getenv('AWS_VERSION');
        $bucketName = getenv('AWS_BUCKET_NAME');
        $accessKey = getenv('AWS_ACCESS_KEY');
        $secretKey = getenv('AWS_SECRET_KEY');

        $this->s3Service = new S3Service($region, $version, $bucketName, $accessKey, $secretKey);
    }

    public function handleFileOperations(): void
    {
        $filePath = '/tmp/example.txt';
        $key = 'example.txt';

        // Create a file locally
        file_put_contents($filePath, 'This is a test file.');

        // Upload the file to S3
        if ($this->s3Service->uploadFile($key, $filePath)) {
            echo "File uploaded successfully.\n";
        }

        // Get the file from S3
        $fileContent = $this->s3Service->getFile($key);
        if ($fileContent !== null) {
            echo "File content: $fileContent\n";
        }

        // Delete the file from S3
        if ($this->s3Service->deleteFile($key)) {
            echo "File deleted successfully.\n";
        }

        // Try to get the file again to confirm deletion
        $fileContent = $this->s3Service->getFile($key);
        if ($fileContent === null) {
            echo "File no longer exists in S3.\n";
        }
    }
}
