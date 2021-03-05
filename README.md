#PHP Multi Language Library
========

Bu sınıf projenize çoklu dil ekleyebileceğiniz bir PHP kütüphanesidir.

- [Kurulum](#kurulum)
- [Basit Kullanımı](#kullanımı)
- [Örnek](#ornek)


<a href="#kurulum"></a>
## Kurulum

Projenizin olduğu dizinde aşağıda bulunan kodu çalıştırınız.

> composer require uppsoft/multilanguage dev-master


Daha sonra, sayfanızda herhangi bir Composer autoload komutu yok ise sayfanınızın başına şu komutu ekleyiniz.

```php
require_once __DIR__ . '/vendor/autoload.php';
```
Bu satırımızın altından devam edelim. Öncelikle proje dizinimizde ```lang``` klasörü oluşturacağımız için şu komutları ekleyin.
```php
use UppSoft\MultiLanguage\Create;
Create::folder();
```
Bu satırları eklemiş olduğunuz sayfaya tarayıcınızdan giriş yapın.Ve dizininizde 'lang' adı altında bir klasör oluştuğunu göreceksiniz.

> İleride tüm dil dosyalarını bu klasörün içine ekleyeceğiz.

Klasörün oluştuğunu gördükten sonra az önce eklediğimiz şu iki satırı silelim çünkü işimiz kalmadı.

```php
/*
use UppSoft\MultiLanguage\Create;
Create::folder();
*/
```

Onun yerine şu satırları ekleyelim.

```php
use UppSoft\MultiLanguage\Language;
use UppSoft\MultiLanguage\Select;

$lang = new Language();
$select  = new Select();
```
Tüm yapılandırma bu kadar.Bundan sonra dil eklemesi yapabiliriz.

<a href="#kullanımı"></a>
## Kullanımı

- [Dil Dosyası Ekleme](#lang-klasörü-İçine-dil-dosyası-ekleme)
- [Sayfada Kullanma](#sayfada-kullanma)
- [Ziyaretçinin Dil Seçmesi](#ziyaretçinin-dil-seçmesi)


<a href="#dosya-ekle"></a>
### 'lang' Klasörü İçine Dil Dosyası Ekleme

Dizinimizde oluşan <b>lang</b> klasörü içine ülke kodu ile klasör açarak çeviri yapacağımız dosyaları oluşturmamız gerekiyor.

Örn:

Türkçe için <b>tr</b> adında bir klasör açıyoruz.
Daha sonra içine çeviri dosyalarımızı ekliyoruz.

Siz istediğiniz dil için klasör ve çeviri dosyası ekleyebilirsiniz.

Türkçe için dil dosyası olarak 'anasayfa' adında bir dosya oluşturalım.Sitenizin büyüklüğüne göre dosyalarınızı çoğaltabilirsiniz.
Fakat aynı dosyaların çevirisini yapmayı unutmayın !

Anasayfamızın çevirilerinin bulunduğu dosyamızı ilk olarak 'tr' klasörü içinde anasayfa.php şeklinde oluşturalım.
> lang/tr/anasayfa.php

```php
<?php

return[
    'baslik' => 'Anasayfa',
    'iletisim' => 'İletişim',
    'sayfa' => 'Sayfa',
    'fotograf' => 'Fotoğraf'
  ];

  ```
  Bu çeviri dosyasını istediğiniz dile çevirebilirsiniz.

  > lang/en/anasayfa.php

  ```php
  <?php

  return[
  'baslik' => 'Homepage',
  'iletisim' => 'Contact',
  'sayfa' => 'Page',
  'fotograf' => 'Photo'
  ];

  ```

  > lang/de/anasayfa.php

  ```php
  <?php

  return[
  'baslik' => 'Homepage',
  'iletisim' => 'Kontakt',
  'sayfa' => 'Seite',
  'fotograf' => 'Foto'
  ];

  ```

  Bunun gibi sınırsız dil ve dosya ekleyebilirsiniz.

  <a href="#ozel-input"></a>
  ### Sayfada Kullanma

  Dosyaları oluşturduktan sonra bunları sayfalarımızda kullanmak için şu komutu kullanıyoruz.

  > $lang->lang('dosyaismi.key');

  Örneğin:

  > $lang->lang('anasayfa.fotograf');

  Bu komut örneği, bize seçili olan dil klasörünün içinde bulunan anasayfa.php dosyasındaki 'fotograf' çevirisinin karşılığını verir.

  ```php
  <?php

  echo "Menüler ".
  $lang->lang('anasayfa.baslik')."<br>".
  $lang->lang('anasayfa.fotograf')."<br>".
  $lang->lang('anasayfa.iletisim')."<br>";
  ```

  Örneğinde olduğu gibi kodlarınızın içerisinde yukarıdaki gibi kullanabilirsiniz.


  ### Ziyaretçinin Dil Seçmesi


  Ziyaretçilerinizin dil seçmesi için şu komut ile sayfanıza entegrasyon yapabilirsiniz.

  > $select->language('tr')

  > $select->language('en')

  > $select->language('de')
  
  > $select->language('..')

  Örnek:
  ```php
  echo "<a href='".$select->language('tr')."'>TR</a><br>";
  echo "<a href='".$select->language('en')."'>EN</a><br>";
  echo "<a href='".$select->language('de')."'>DE</a><br>";
  ```

  Bu şekilde link verdiğiniz takdirde ziyaretçi tıklayınca otomatik olarak eklemiş olduğunuz dil dosyası aktif olacaktır.

  > Bu dil isimleri lang klasöründe oluşturduğumuz dil dosyaları ile bağlantılıdır.
