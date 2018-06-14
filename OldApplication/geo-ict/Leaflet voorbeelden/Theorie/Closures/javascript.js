//Voorbeeld van een closure
//Een closure koppelt een functie met een andere functie
//zodat variabelen die binnen deze functie gedeclareerd zijn 
//ook in de aanroepende/verwijzende omgeving aan te spreken zijn.
var createGreeting = function(greeting) {
    return function(name) {
        document.write(greeting + ', ' + name + '.');
    };
};

helloGreeting = createGreeting("Hello");
howdyGreeting = createGreeting("Howdy");

helloGreeting("John");  // Hello, John.
helloGreeting("Sally"); // Hello, Sally.
howdyGreeting("John");  // Howdy, John.
howdyGreeting("Sally"); // Howdy, Sally.

/*In computer science, a closure is a first-class function with free variables that are bound in the lexical environment. 
Such a function is said to be "closed over" its free variables. 
A closure is defined within the scope of its free variables, 
and the extent of those variables is at least as long
 as the lifetime of the closure itself. */

/* A closure is a function defined within another scope that has access to all the variables within the outer scope.
*/

