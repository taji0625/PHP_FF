<?php

class Loader
{
  private $directories = array();

  public function regDirectory($dir)
  {
    $this->directories[] = $dir;
    return;
  }

  public function register()
  {
    spl_autoload_register(array($this, 'loadClass'));
  }

  public function loadClass($className)
  {
    // パスを１個ずつ取り出す
    foreach ($this->directories as $dir) {
      $filePath = $dir . '/' . $className . '.php';
      // $filePathが読み込めるかどうかチェック
      if (is_readable($filePath)) {
        // 読み込めたら、requireして、ループ終了
        require $filePath;
        return;
      }
    }
  }
}