<?php

require_once("Say/Interfaces/Hello.php");
require_once("Say/Interfaces/Bar.php");
require_once("Say/AbstractHello.php");
require_once("Say/Say.php");
require_once("Foo.php");

$foo = new Foo();
var_dump($foo);
var_dump($foo->bar());
var_dump($foo->setHello('say'));
var_dump($foo->getHello());

$method = new ReflectionMethod('Foo', 'getHello');

// Print out basic information
echo "<pre>";
printf(
    "===> The %s%s%s%s%s%s%s method '%s' (which is %s)\n" .
    "     declared in %s\n" .
    "     lines %d to %d\n" .
    "     having the modifiers %d[%s]\n",
        $method->isInternal() ? 'internal' : 'user-defined',
        $method->isAbstract() ? ' abstract' : '',
        $method->isFinal() ? ' final' : '',
        $method->isPublic() ? ' public' : '',
        $method->isPrivate() ? ' private' : '',
        $method->isProtected() ? ' protected' : '',
        $method->isStatic() ? ' static' : '',
        $method->getName(),
        $method->isConstructor() ? 'the constructor' : 'a regular method',
        $method->getFileName(),
        $method->getStartLine(),
        $method->getEndline(),
        $method->getModifiers(),
        implode(' ', Reflection::getModifierNames($method->getModifiers()))
);


// Print documentation comment
printf("---> Documentation:\n %s\n", var_export($method->getDocComment(), 1));

// Print static variables if existant
if ($to= $method->getStaticVariables()) {
    printf("---> Static variables: %s\n", var_export($to, 1));
}

// Invoke the method
/*
printf("---> Invocation results in: ");
var_dump($method->invoke(NULL));
*/

$class = new ReflectionClass('Foo');
var_dump($class->getParentClass());

$class = new ReflectionClass('Say\\Say');
var_dump($class->getParentClass());

echo "</pre>";