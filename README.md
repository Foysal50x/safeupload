# safeupload

PHP SafeUpload library that supports chunked uploads. Adopted from the
procedural script designed to work
with that JavaScript plugin, with normal forms, and to be embeddable into
any application/architecture.

### Installing

This package is available via Composer:

```
composer require faisal50x/safeupload
```

### Requirements

-   Ensure PHP version 7.1 or Higher
-   Ensure that the PHP extension "php_fileinfo" is enabled;

-   Your php.ini must have the next directive:

`file_uploads = On`

### Status

The unit test suite covers simple uploads and the library "works on my machine", as it were. You are welcome to contribute.

You can grep the source code for `TODO` to find things you could help finishing.

### Usage

```php
//Complete example is comingsoon...
$path = new \Safe\Resolver\Path(__DIR__ . '/files/upload/');
$validator = new \Safe\Validator\Validate();
$mimeType = new \Safe\Validator\MimeType();
$upload = new \Safe\Upload($_FILES);
$validator->setMimeType($mimeType);
$upload->setValidator($validator);
$upload->setUploadPath($path);
$upload->prepare();
if($upload->ok){
    //Do something ...
    echo $upload->getFilePath();
}
```

### Extending

The reason why the path resolver, the validators and the file system are
abstracted, is so you can write your own, fitting your own needs (and also,
for unit testing). The library is shipped with a bunch of "simple"
implementations which fit the basic needs. You could write a file system
implementation that works with Amazon S3, for example.

### License

Licensed under the MIT license, see `LICENSE` file.
