# bearsunday-spike

## 原因

* `AuraSessionModule` は `Aura\Session\Session` を `$delete_cookie = null` で生成している。
* `Aura\Session\Session` 内部で `! $delete_cookie` の場合は無名関数が設定される。
* 無名関数は `serialize` 関数でシリアライズできない。
* BEAR.Sunday のコンパイル後のチェックで警告が出る。

```text
composer run-script compile
> ./vendor/bin/bear.compile 'MyVendor\MyProject' prod-html-app ./
PHP Warning:  Failed to verify the injector cache. See https://github.com/bearsunday/BEAR.Package/issues/418 in /path-to/bearsunday-spike/MyVendor.MyProject/vendor/bear/package/src/Injector/PackageInjector.php on line 102

Warning: Failed to verify the injector cache. See https://github.com/bearsunday/BEAR.Package/issues/418 in /path-to/bearsunday-spike/MyVendor.MyProject/vendor/bear/package/src/Injector/PackageInjector.php on line 102
PHP Warning:  Cannot modify header information - headers already sent by (output started at /path-to/bearsunday-spike/MyVendor.MyProject/vendor/bear/package/src/Injector/PackageInjector.php:102) in /path-to/bearsunday-spike/MyVendor.MyProject/vendor/bear/sunday/src/Provide/Transfer/HttpResponder.php on line 29
PHP Warning:  Cannot modify header information - headers already sent by (output started at /path-to/bearsunday-spike/MyVendor.MyProject/vendor/bear/package/src/Injector/PackageInjector.php:102) in /path-to/bearsunday-spike/MyVendor.MyProject/vendor/bear/sunday/src/Provide/Transfer/HttpResponder.php on line 29
PHP Warning:  Cannot modify header information - headers already sent by (output started at /path-to/bearsunday-spike/MyVendor.MyProject/vendor/bear/package/src/Injector/PackageInjector.php:102) in /path-to/bearsunday-spike/MyVendor.MyProject/vendor/bear/sunday/src/Provide/Transfer/HttpResponder.php on line 29
............................................................
............................................

Compilation (1/2) took 0.160000 seconds and used 7.527000MB of memory
Success: 104 Failed: 0
Preload compile: /path-to/bearsunday-spike/MyVendor.MyProject/preload.php
Object graph diagram: /path-to/bearsunday-spike/MyVendor.MyProject/var/log/prod-html-app/module.dot
PHP Warning:  Failed to verify the injector cache. See https://github.com/bearsunday/BEAR.Package/issues/418 in /path-to/bearsunday-spike/MyVendor.MyProject/vendor/bear/package/src/Injector/PackageInjector.php on line 102

Warning: Failed to verify the injector cache. See https://github.com/bearsunday/BEAR.Package/issues/418 in /path-to/bearsunday-spike/MyVendor.MyProject/vendor/bear/package/src/Injector/PackageInjector.php on line 102
PHP Warning:  Cannot modify header information - headers already sent by (output started at /path-to/bearsunday-spike/MyVendor.MyProject/vendor/bear/package/src/Injector/PackageInjector.php:102) in /path-to/bearsunday-spike/MyVendor.MyProject/vendor/bear/sunday/src/Provide/Transfer/HttpResponder.php on line 29
PHP Warning:  Cannot modify header information - headers already sent by (output started at /path-to/bearsunday-spike/MyVendor.MyProject/vendor/bear/package/src/Injector/PackageInjector.php:102) in /path-to/bearsunday-spike/MyVendor.MyProject/vendor/bear/sunday/src/Provide/Transfer/HttpResponder.php on line 29
PHP Warning:  Cannot modify header information - headers already sent by (output started at /path-to/bearsunday-spike/MyVendor.MyProject/vendor/bear/package/src/Injector/PackageInjector.php:102) in /path-to/bearsunday-spike/MyVendor.MyProject/vendor/bear/sunday/src/Provide/Transfer/HttpResponder.php on line 29
PHP Warning:  Cannot modify header information - headers already sent by (output started at /path-to/bearsunday-spike/MyVendor.MyProject/vendor/bear/package/src/Injector/PackageInjector.php:102) in /path-to/bearsunday-spike/MyVendor.MyProject/vendor/bear/sunday/src/Provide/Transfer/HttpResponder.php on line 29
Compilation (2/2) took 0.040000 seconds and used 5.148000MB of memory
autoload.php: /path-to/bearsunday-spike/MyVendor.MyProject/autoload.php
```

## 解決方法

* `AuraSessionModule` をインストールする前に以下の設定を追加する 

```php
$this->bind()->annotatedWith(DeleteCookie::class)->toInstance([new DeleteCookieInvoker(), '__invoke']);
```
