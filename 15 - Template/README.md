The problem: 

code duplication

The solution:

Abstract class

The template pattern suggets that we avoid the code duplication by creating an abstract class that the class need to extend.
Within this abstract class, we convene the code instead of duplicating it. Since the subclass inherit the code of the abstract class, they are able to re-use the methods of the parent class, instead pf each sub class having to duplicate the exact same code.







