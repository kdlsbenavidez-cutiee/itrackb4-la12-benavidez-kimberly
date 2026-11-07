# ITRACKB4 - LA11: Finish Your Own CRUD

## G1. Route Model Binding

In my Skincare Products project, Route Model Binding requires the model to be type-hinted as `Skincare` and the parameter name to match the route segment `{skincare}`. If only one condition is correct, Laravel may not automatically provide the expected record to the controller method.

## G2. Delete Link

My Delete link opened the product detail page instead of deleting the record because an HTML link sends a GET request. The destroy route requires a DELETE request, so I replaced the link with a form using `@csrf` and `@method('DELETE')`.

## G3. old() Function

In my edit form, `old()` uses the existing Skincare record's value as its second argument. Without this fallback, the fields would be empty when first opening the edit form; without `old()` and using only the existing record's value, previously typed values would not be retained after a validation error.

