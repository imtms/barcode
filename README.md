Barcode - A Psr-4 Barcode Generator
================

## Installation

To get the latest version of Barcode Generator, simply require the project using [Composer](https://getcomposer.org):

  ```shell
  composer require imtms/barcode
  ```
Instead, you may of course manually update your require block and run `composer update` if you so choose:

```json
{
    "require": {
        "imtms/barcode": "^1.0"
    }
}
```

## Usage

You can choose the type of barcode you need.

Currently support:

```
  codabar
  code39
  code39extended
  code93
  code128
  ean8
  ean13
  gs1128
  i25
  intelligentmail
  isbn
  msi
  othercode
  postnet
  s25
  upca
  upce
  upcext2
  upcext5
```

You can also add your own type in Type folder.

You can customize the font,color,size,image_format of your barcode.

Example:

  ```php
  use imtms\Barcode\Type\BCGgs1128;
  use imtms\Barcode\Font\BCGFontFile;
  use imtms\Barcode\Util\BCGColor;
  use imtms\Barcode\BCGDrawing;

  $code = new BCGgs1128();
  $code->setScale(2); // Resolution
  $code->parse("Your Barcode"); // Text
  $drawing = new BCGDrawing('', new BCGColor(255, 255, 255));
  $drawing->setBarcode($code);
  $drawing->draw();
  $drawing->finish(BCGDrawing::IMG_FORMAT_PNG);
  ```
  

## License

[The MIT License (MIT)](LICENSE).
