# bearsunday-spike

## 検証

`#[Embed]` を設定した `onPost` や `onPostValidationFailed` が正しく埋め込みされているか。

※ `FormValidation` は `@Annotation` として定義されているので `#[Embed]` で使えない 

### Case1 : NG

```php
    /** @FormValidation(onFailure="onPostValidationFailed") */
    #[Embed(rel: "hello", src: "app://self/hello")]
    public function onPost(string $name): static
    {
    }
```

* `Ray\Aop\ReflectiveMethodInvocation::proceed()`
  * `Ray\WebFormModule\AuraInputInterceptor`

### Case2 : NG

```php
    #[Embed(rel: "hello", src: "app://self/hello")]
    /** @FormValidation(onFailure="onPostValidationFailed") */
    public function onPost(string $name): static
    {
    }
```

* `Ray\Aop\ReflectiveMethodInvocation::proceed()`
  * `Ray\WebFormModule\AuraInputInterceptor`

### Case3 : OK

```php
    /**
     * @Embed(rel="hello", src="app://self/hello")
     * @FormValidation(onFailure="onPostValidationFailed")
     */
    public function onPost(string $name): static
    {
    }
```

* `Ray\Aop\ReflectiveMethodInvocation::proceed()`
  * `BEAR\Resource\EmbedInterceptor`
  * `Ray\WebFormModule\AuraInputInterceptor`

## 結論

`Embed` と `FormValidation` を同時に使用する場合はアノテーションで書く。

公式のマニュアルに以下が記載されている。  
（Embed をアトリビュート、FormValidation をアノテーションにしたとき、FormValidation が優先しているように見える...）

https://bearsunday.github.io/manuals/1.0/ja/attribute.html
> １つのメソッドで混在するときはアトリビュートが優先されます。
