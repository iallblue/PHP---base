###   代码风格规范
***
翻译自：[http://www.php-fig.org/psr/psr-2/](http://www.php-fig.org/psr/psr-2/)

## PSR-2 ： Coding Style Guide

   本篇规范是【PSR-1】的基本代码规范的继承与扩展

   本规范希望通过制定一系列规范化的PHP代码，以减少在浏览不同作者的代码时因代码风格不同而造成的不便

   当多名程序员在多个项目中合作时，就需要一个共同的编码规范，而本文中的风格规范源自于多个不同项目代码风格的共同特性，因此本规范的价值在于我们都遵循这个编码风格，而不是在于它本身

> 关键字`MUST(必须)`,`MUST NOT(一定不)`,`REQUIRED(需要)` ,`SHALL(将会)` ,`SHALL NOT(不会)`, `SHOULD(应该)`,`SHOULD NOT(不应该)` ,`RECOMMENDED(推荐)`,`MAY(可以)`,and`OPTIONAL(可选)`等描述可参考[RFC 2119](http://www.ietf.org/rfc/rfc2119.txt)

   1.概览
   
   *   代码必须遵守PSR的规范
   *   代码必须要用`4个空格`而不是用`tab`
   *   每行一定不能有严格的长度限制，每行应该在`80`字符左右或更少，但不能多于`120`个字符
   *   在namespace声明后面和use声明块后面必须要有一个空白行
   *   类开始的花括号必须写在声明类的下面一行并自成一行，类结束的花括号必须写在类主体之后的后一行
   *   方法开始的花括号必须写在声明方法下面一行并自成一行，结束的花括号必须写在方法主体之后的后一行
   *   必须在所有属性和方法之前声明访问修饰符；`abstract`,`final`必须声明在访问修饰符之前，`static`必须声明在访问修饰符之后
   *   控制结构后面的关键字后面必须要有一个空格，调用方法或函数后则一定不能有空格
   *   控制结构的开始花括号`{`必须在声明的同一行，结束花括号`}`必须在结构体的下一行并自成一行。
   *   控制结构的开始圆括号`(`之后和结束的圆括号`)`之前一定一定不能有空格

   1.1 例子

   以下例子程序简单地展示了以上大部分规范

```
<?php
namespace Vendor\Package;

use FooInterface;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

class Foo extends Bar implements FooInterface
{
    public function sampleMethod($a, $b = null)
    {
        if ($a === $b) {
            bar();
        } elseif ($a > $b) {
            $foo->bar($arg1);
        } else {
            BazClass::bar($arg2, $arg3);
        }
    }

    final public static function bar()
    {
        // method body
    }
}
```

   2.1 基本编码规则

   代码必须遵守`PSR-1`的所有规范

   2.2 文件

   所有的php文件必须使用`unix`下的`LF`换行符作为行的结束符。

   所有的php文件必须用一个空白行作为结束

   在只有php代码的文件中结束的`?>`标签必须省略

   2.3 行
   
   每一行的长度一定不能有硬性的限制

   每行的长度一定要限制在120个字符内，自动化的(带代码规范)的编辑器一定不能发出错误提示而应该发出警告

   每一行的长度不应该多余80个字符，多余80个字符的应该被分成多行，每行的长度也不应该长于80个字符

   在非空行的后面一定不能有多余的空格

   空行可以增加代码的可读性和有助于代码的分块

   每行只能有一条语句

   2.4 缩进(indent)

   代码必须使用`4`个空格的缩进，一定不能用`tab`代替空格缩进

   备注：使用空格而不是用`tab`缩进，有助于避免在比较代码差异，打补丁，重阅代码以及注释时产生的混淆，并且使用空格缩进，也可以方便对齐

   2.5 关键字和`True`/`False`/`Null`

   php的关键字必须使用`小写形式`

   php的常量`true`,`false`,`null`必须使用小写

   1.命名空间和use声明

   在使用namespace时，后面必须有一个空行

   所有的use声明必须在namespace声明之后

   每条声明use语句的那一行，只能有一个use关键字

   use块后面必须有一个空行

   例如：

```
<?php
namespace Vendor\Package;

use FooClass;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

// ... 添加PHP代码 ...
```
   类属性和方法

   术语`class`表示所有类，接口和可重复代码块

   4.1 继承和接口

   关键字`extends`和`implements`必须和类名声明在同一行

   类的开始花括号`{`必须自成一行，结束花括号`}`必须在方法主体后单独成一行

```
namespace Vendor\Package;

use FooClass;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

class ClassName extends ParentClass implements \ArrayAccess, \Countable
{
    //常量, 属性，方法
}
```
`implements`的继承列表也可以分成多行，这样的话，每个继承接口名称都必须分开独立成行，包括第一个

```
<?php
namespace Vendor\Package;

use FooClass;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

class ClassName extends ParentClass implements
    \ArrayAccess,
    \Countable,
    \Serializable
{
     //常量, 属性，方法
}
```
   4.2 属性
   
   在所有属性前，必须声明访问性

   `var`关键字不能用来声明属性

   在每条声明语句内不能声明多个属性

   不能用下划线作为前缀表示属性名是保护的或私有的访问修饰符

   以下是一个范例

```
<?php
namespace Vendor\Package;

class ClassName
{
    public $foo = null;
}
```

   4.3 方法
   
   必须在所有方法前声明访问修饰符

   不能用下划线作为前缀表示方法名是protected或private访问修饰符

   方法名称后一定不能有空格符，开始的花括号必须和自成一行，结束的花括号必须在函数体的下一行并自成一行，开始的花括号之前和结束的花括号之后一定不能有空格行

   一个标准的方法声明可参照以下范例，留意括号，空格以及花括号的位置

```
<?php
namespace Vendor\Package;

class ClassName
{
    public function fooBarBaz($arg1, &$arg2, $arg3 = [])
    {
        // method body
    }
}
```

   4.4 方法参数
   
   在参数列表中，每个逗号前不能有空格，在每个逗号后面必须要有一个空格

   有默认值的参数必须要参数的列表的最后面

```
<?php
namespace Vendor\Package;

class ClassName
{
    public function foo($arg1, &$arg2, $arg3 = [])
    {
        // 方法体
    }
}
```

   参数列表可以被分隔成多行，这样包括第一个参数在内的每个参数都必须单独成行，分隔成多行以后，每行必须只有一个参数单独成行

   当参数列表被拆分成多行，结束的括号必须和开始时的花括号必须在同一行并用一个空格分隔

```
<?php
namespace Vendor\Package;

class ClassName
{
    public function aVeryLongMethodName(
        ClassTypeHint $arg1,
        &$arg2,
        array $arg3 = []
    ) {
        // 方法体
    }
}
```
   4.5 `abstract`,`final`和`static`

   abstract 和 final 必须在访问修饰符之前

   static 必须在访问修饰符之后

```
<?php
namespace Vendor\Package;

abstract class ClassName
{
    protected static $foo;

    abstract protected function zim();

    final public static function bar()
    {
        // method body
    }
}
```    
   4.6 方法和函数调用
   
   在调用方法或函数时，方法或函数名与(参数)左括号之间一定不能有空格，(参数)右括号前也一定不能有空格，在参数列表中，每个逗号前一定不能有空格，每个逗号后一定要有空格

```
<?php
bar();
$foo->bar($arg1);
Foo::bar($arg2, $arg3);
```
   参数列表可以本分成多行，此时包括第一个参数在内的每个参数都必须单独成行

```
<?php
$foo->bar(
    $longArgument,
    $longerArgument,
    $muchLongerArgument
);
```
   控制结构

   控制结构基本规范如下：

   *   在每个控制结构关键字后必须要有一个空格
   *   开始的括号(左括号)之后不能有空格
   *   结束的括号(右括号)之前不能有空格
   *   右括号`)`与开始的花括号`{`之间一定要有一个空格
   *   结构体主体一定要有一次缩进
   *   结构的花括号一定在结构体主体后单独成一行
 
   每个结构体的主体都必须被包含在成对的花括号之间，这让结构体结构性看起来更强，以及减少增加新行时出错的可能性

   5.1 `if`,`else if`和`else`

   标准的if结构如下代码所示，注意括号，空格以及花括号的位置，注意`else`的`elseif`都与前面的结束花括号在同一行

```
<?php
if ($expr1) {
    // if body
} elseif ($expr2) {
    // elseif body
} else {
    // else body;
}

```
   
   应使用关键字`elseif`而不是用`else if`，为了所有控制结构关键字看起来像一个单词

   5.2 `switch`,`case`

   switch结构如下面所示，注意括号，空格和花括号的位置，case必须相对switch进行一次缩进，而break关键字以及case内其他语句都相对于case进行一次缩进，主体内必须有注释如 `//no break`当存在非空的case的直穿语句

```
<?php
switch ($expr) {
    case 0:
        echo 'First case, with a break';
        break;
    case 1:
        echo 'Second case, which falls through';
        // no break
    case 2:
    case 3:
    case 4:
        echo 'Third case, return instead of break';
        return;
    default:
        echo 'Default case';
        break;
}

```

   5.3 `while`,`do while`

   while的声明如下，注意括号，空格和花括号的位置

```
<?php
while ($expr) {
    // structure body
}
```
   相似的，do-while和上面相同，注意括号，空格和花括号的位置

```
<?php
do {
    // structure body;
} while ($expr);

```

   5.4 `for`

   `for`的声明如下，注意括号，空格和花括号的位置

```
<?php
for ($i = 0; $i < 10; $i++) {
    // for body
}

```
   5.5 `foreach`

   `foreach`的声明如下，注意括号，空格和花括号的位置

```
<?php
foreach ($iterable as $key => $value) {
    // foreach body
}
```
   5.6 `try,catch`

   `try,catch`的声明如下，注意括号，空格和花括号的位置

```
<?php
try {
    // try body
} catch (FirstExceptionType $e) {
    // catch body
} catch (OtherExceptionType $e) {
    // catch body
}
```
   闭包

   闭包声明时关键词`function`后以及关键字时`use`的前后都必须要有一个空格

   开始花括号必须写在声明的同一行，结束花括号必须紧跟主体结束的下一行

   参数列表和变量列表的左括号后以及右括号前，必须不能有空格

   参数列表中，逗号前不能有空格，逗号后要有空格

   闭包函数中有默认值的参数要在参数列表的最后

   标准的闭包声明如下，注意括号，空格和花括号的位置

```
<?php
$closureWithArgs = function ($arg1, $arg2) {
    // body
};

$closureWithArgsAndVars = function ($arg1, $arg2) use ($var1, $var2) {
    // body
};
```
   参数列表以及变量列表可以分成多行，这样包括第一个在内的每个参数或变量都必须单独成行，而列表的右括号与闭包的开始花括号必须在同一行

   以下几个例子包含了参数和变量列表被分成多行的多情况

```
<?php
$longArgs_noVars = function (
    $longArgument,
    $longerArgument,
    $muchLongerArgument
) {
    // body
};

$noArgs_longVars = function () use (
    $longVar1,
    $longerVar2,
    $muchLongerVar3
) {
    // body
};

$longArgs_longVars = function (
    $longArgument,
    $longerArgument,
    $muchLongerArgument
) use (
    $longVar1,
    $longerVar2,
    $muchLongerVar3
) {
    // body
};

$longArgs_shortVars = function (
    $longArgument,
    $longerArgument,
    $muchLongerArgument
) use ($var1) {
    // body
};

$shortArgs_longVars = function ($arg) use (
    $longVar1,
    $longerVar2,
    $muchLongerVar3
) {
    // body
};

Note that the formatting rules also apply when the closure is used directly in a function or method call as an argument.

<?php
$foo->bar(
    $arg1,
    function ($arg2) use ($var1) {
        // body
    },
    $arg3
);


```   

   注意闭包被直接用作函数或方法调用参数时，以上规范仍适用

```
<?php
$foo->bar(
    $arg1,
    function ($arg2) use ($var1) {
        // body
    },
    $arg3
);
```
