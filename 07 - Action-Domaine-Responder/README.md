The problem:

MVC, isn't a great fit.

Action-Domain-Responder

A refinement of MVC that transforms the View portion into a more specific responder implementation that handles all aspects of the HTTP response: session, cookies, HTML, content types, etc.

Clarity

Drawbacks

- New, not many implementations in the wild
- Limited documentation
Compare with MVC

----

# From model to domain

## Essentially identical responsability:

- Communicate with data source
- Encapsulate business rules

## Renamed to reflect more modern concepts:

- Domain logic
- Domain Driven Design

----

# A controller does too much

## Controller's methods:

- indexAction
- createAction
- editAction
- deleteAction
- ...

## Dependency injection nightmare

## Single Responsibility Principle?

----

# An action method does too much

## An action method's job:

- Make sense of input
- Pass nput to Model
- Check model's results
- Figure out wich response to send
- Prepare and return response
- ...

## Single responsibility Principle?

----

# A View is not enough

## A view's task:

- Accept application data
- Build output from data and templates

## View does not take care of:

- Deciding which data type to output
- Sending necessary HTTP headers

## Views is Response, we need a Responder

----

# From View to Responder

- Sends HTTP headers
- Assembles output
- Returns Response


----

# Components

## Domain:

The logic to manipulate data and application state, based on your business logic.

## Responder:

Handles everything connected to building an HTTP responde. Headers, cookies, status codes a,d response content are built here.

## Action:

Connects the Domain to the Responder. Passes input data to Domain, Passes Domain output to Responder.