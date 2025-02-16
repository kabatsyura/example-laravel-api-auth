<?php

namespace Tests;

use Illuminate\Support\Facades\DB;

class Helpers
{
  private static array $savedIds = [];

  public static function getId(string $name): int
  {
    if (isset(self::$savedIds[$name])) {
      return self::$savedIds[$name];
    }

    $id = crc32($name);
    self::$savedIds[$name] = $id;

    return $id;
  }

  public static function fixSequenceId(string $tableName): void
  {
    $newId = DB::table($tableName)->max('id') + 1;
    DB::statement("alter sequence {$tableName}_id_seq restart with {$newId}");
  }
}