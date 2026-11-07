# ITRACKB4 LA12 - Make the Failures Yours

## Activity Overview

This activity demonstrates Laravel 12 exception handling, application logging, HTTP error responses, and custom error pages using the Skincare Products project.

## H1. Why was the vendor file shown at the top of the error page not where the mistake was made?

The vendor file was shown because Laravel's framework code handled the method call and detected that the requested method did not exist. However, the actual mistake was in my own `SkincareController.php`, where I accidentally used `withh()` instead of `with()`. The exception trace helped me locate the exact line in my controller where the error originated.

## H2. What does a custom Log::info message with a context array tell the next developer that the error page could not?

A custom `Log::info()` message with a context array provides useful information about an application event, such as when a skincare product was successfully saved and its actual database ID. This helps the next developer identify which record was involved without relying only on an error page. It also makes troubleshooting and tracking application activities easier.

## H3. When is a 403 response better than redirecting back with a message?

A 403 Forbidden response is better when a user attempts an action that is not allowed by the application's rules or authorization conditions. It clearly communicates that access to the requested action is forbidden. Redirecting back with a message is more appropriate for ordinary validation or user feedback when the user can continue using the application.

## Conclusion

Through this activity, I learned how to identify Laravel exceptions, control debug details, examine application logs, create custom log messages, protect records using HTTP 403 responses, and customize HTTP 404 and 500 error pages.