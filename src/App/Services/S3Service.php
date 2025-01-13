<?php

namespace App\Services;

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

class S3Service
{
    private S3Client $s3Client;
    private string $bucketName;

    public function __construct(string $region, string $version, string $bucketName, string $accessKey, string $secretKey)
    {
        $this->s3Client = new S3Client([
            'region'  => $region,
            'version' => $version,
            'credentials' => [
                'key'    => $accessKey,
                'secret' => $secretKey,
            ],
        ]);

        $this->bucketName = $bucketName;
    }

    /**
     * Upload a file to the specified S3 bucket.
     *
     * @param string $key The key to save the file as in S3.
     * @param string $filePath The local path of the file to upload.
     * @return bool True if the upload was successful, false otherwise.
     */
    public function uploadFile(string $key, string $filePath): bool
    {
        try {
            $this->s3Client->putObject([
                'Bucket' => $this->bucketName,
                'Key'    => $key,
                'SourceFile' => $filePath,
            ]);

            return true;
        } catch (AwsException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    /**
     * Download a file from the specified S3 bucket.
     *
     * @param string $key The key of the file in S3.
     * @return string|null The file content if successful, or null on failure.
     */
    public function getFile(string $key): ?string
    {
        try {
            $result = $this->s3Client->getObject([
                'Bucket' => $this->bucketName,
                'Key'    => $key,
            ]);

            return $result['Body']->getContents();
        } catch (AwsException $e) {
            error_log($e->getMessage());
            return null;
        }
    }

    /**
     * Delete a file from the specified S3 bucket.
     *
     * @param string $key The key of the file in S3.
     * @return bool True if the deletion was successful, false otherwise.
     */
    public function deleteFile(string $key): bool
    {
        try {
            $this->s3Client->deleteObject([
                'Bucket' => $this->bucketName,
                'Key'    => $key,
            ]);

            return true;
        } catch (AwsException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}
