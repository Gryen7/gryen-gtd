<?php
/**
 * Created by PhpStorm.
 * User: gcy77
 * Date: 2016/3/22
 * Time: 11:36
 */

namespace Targaryen\QiniuFilesystem;

use Illuminate\Contracts\Filesystem\Cloud as CloudFilesystemContract;
use Illuminate\Contracts\Filesystem\Filesystem as FilesystemContract;
use Qiniu\Auth;
use Qiniu\Http\Error;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;

class QiniuFilesystemAdapter implements FilesystemContract, CloudFilesystemContract
{

    /**
     * @var null
     */
    protected $accessKey = null;

    /**
     * @var null
     */
    protected $secretKey = null;

    /**
     * @var null
     */
    protected $domain = null;
    /**
     * @param \Qiniu\Auth
     */
    protected $auth = null;

    /**
     * @param
     */
    protected $uploadToken = null;

    /**
     * @var null
     */
    protected $bucket = null;
    /**
     * @param \Qiniu\Storage\BucketManager
     */
    protected $bucketManager = null;
    /**
     * @param \Qiniu\Storage\UploadManager
     */
    protected $uploadManager = null;


    /**
     * @param $accessKey
     * @param $secretKey
     * @param $bucket
     * @param $domain
     */
    public function _construct($accessKey, $secretKey, $bucket, $domain)
    {
        $this->accessKey = $accessKey;
        $this->secretKey = $secretKey;
        $this->bucket = $bucket;
        $this->domain = $domain;
    }

    /**
     * @param Error $error
     */
    public function logError(Error $error)
    {
        \Log::error($error->message());
    }

    /**
     * @return null|Auth
     */
    public function getAuth()
    {
        if ($this->auth == null) {
            $this->auth = new Auth($this->accessKey, $this->secretKey);

        }
        return $this->auth;
    }

    /**
     * @param null $key
     * @param int $expires
     * @param null $policy
     * @param bool $strictPolicy
     * @return null|string
     */
    public function getUploadToken($key = null, $expires = 3600, $policy = null, $strictPolicy = true)
    {
        if ($this->uploadToken == null) {
            $auth = $this->getAuth();
            $this->uploadToken =
                $auth->uploadToken($this->bucket, $key, $expires, $policy, $strictPolicy);
        }
        return $this->uploadToken;
    }

    /**
     * @return null|UploadManager
     */
    public function getUploadManager()
    {
        if ($this->uploadManager == null) {
            $this->uploadManager = new UploadManager();
        }
        return $this->uploadManager;
    }

    /**
     * @return null|BucketManager
     */
    public function getBucketManager()
    {
        if ($this->bucketManager == null) {
            $this->bucketManager = new BucketManager($this->getAuth());
        }
        return $this->bucketManager;
    }

    /**
     * Determine if a file exists.
     *
     * @param  string $path
     * @return bool
     */
    public function exists($path)
    {
        // TODO: Implement exists() method.
        if ($this->get($path)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the contents of a file.
     *
     * @param  string $path
     * @return string
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function get($path)
    {
        // TODO: Implement get() method.
        list($ret, $err) = $this->getBucketManager()->stat($this->bucket, $path);
        if ($err !== null) {
            $this->logError($err);
            return false;
        } else {
            return $ret;
        }
    }

    /**
     * Write the contents of a file.
     *
     * @param  string $path
     * @param  string|resource $contents
     * @param  string $visibility
     * @return bool
     */
    public function put($path, $contents, $visibility = null)
    {
        // TODO: Implement put() method.
        list($ret, $err) = $this->getUploadManager()->put($this->getUploadToken(), $path, $contents);
        if ($err !== null) {
            $this->logError($err);
            return false;
        } else {
            return $ret;
        }
    }

    /**
     * Get the visibility for the given path.
     *
     * @param  string $path
     * @return string
     */
    public function getVisibility($path)
    {
        // TODO: Implement getVisibility() method.
    }

    /**
     * Set the visibility for the given path.
     *
     * @param  string $path
     * @param  string $visibility
     * @return void
     */
    public function setVisibility($path, $visibility)
    {
        // TODO: Implement setVisibility() method.
    }

    /**
     * Prepend to a file.
     *
     * @param  string $path
     * @param  string $data
     * @return int
     */
    public function prepend($path, $data)
    {
        // TODO: Implement prepend() method.
    }

    /**
     * Append to a file.
     *
     * @param  string $path
     * @param  string $data
     * @return int
     */
    public function append($path, $data)
    {
        // TODO: Implement append() method.
    }

    /**
     * Delete the file at a given path.
     *
     * @param  string|array $paths
     * @return bool
     */
    public function delete($paths)
    {
        // TODO: Implement delete() method.
        $err = $this->getBucketManager()->delete($this->bucket, $paths);
        if ($err !== null) {
            $this->logError($err);
            return false;
        } else {
            return true;
        }
    }

    /**
     * Copy a file to a new location.
     *
     * @param  string $from
     * @param  string $to
     * @return bool
     */
    public function copy($from, $to)
    {
        // TODO: Implement copy() method.
        $err = $this->getBucketManager()->copy($this->bucket, $from, $this->bucket, $to);
        if ($err !== null) {
            $this->logError($err);
            return false;
        } else {
            return true;
        }
    }

    /**
     * Move a file to a new location.
     *
     * @param  string $from
     * @param  string $to
     * @return bool
     */
    public function move($from, $to)
    {
        // TODO: Implement move() method.
        $err = $this->getBucketManager()->move($this->bucket, $from, $this->bucket, $to);
        if ($err !== null) {
            $this->logError($err);
            return false;
        } else {
            return true;
        }
    }

    /**
     * Get the file size of a given file.
     *
     * @param  string $path
     * @return int
     */
    public function size($path)
    {
        // TODO: Implement size() method.
    }

    /**
     * Get the file's last modification time.
     *
     * @param  string $path
     * @return int
     */
    public function lastModified($path)
    {
        // TODO: Implement lastModified() method.
    }

    /**
     * Get an array of all files in a directory.
     *
     * @param  string|null $directory
     * @param  bool $recursive
     * @return array
     */
    public function files($directory = null, $recursive = false)
    {
        // TODO: Implement files() method.
    }

    /**
     * Get all of the files from the given directory (recursive).
     *
     * @param  string|null $directory
     * @return array
     */
    public function allFiles($directory = null)
    {
        // TODO: Implement allFiles() method.
    }

    /**
     * Get all of the directories within a given directory.
     *
     * @param  string|null $directory
     * @param  bool $recursive
     * @return array
     */
    public function directories($directory = null, $recursive = false)
    {
        // TODO: Implement directories() method.
    }

    /**
     * Get all (recursive) of the directories within a given directory.
     *
     * @param  string|null $directory
     * @return array
     */
    public function allDirectories($directory = null)
    {
        // TODO: Implement allDirectories() method.
    }

    /**
     * Create a directory.
     *
     * @param  string $path
     * @return bool
     */
    public function makeDirectory($path)
    {
        // TODO: Implement makeDirectory() method.
    }

    /**
     * Recursively delete a directory.
     *
     * @param  string $directory
     * @return bool
     */
    public function deleteDirectory($directory)
    {
        // TODO: Implement deleteDirectory() method.
    }
}