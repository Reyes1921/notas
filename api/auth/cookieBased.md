[Volver al Menú](./root.md)

# `Cookie-Based Authentication`

Cookies are pieces of data used to identify the user and their preferences. The browser returns the cookie to the server every time the page is requested. Specific cookies like HTTP cookies are used to perform cookie-based authentication to maintain the session for each user.

- `Step 1`: Client > Signing up

Before anything else, the user has to sign up. The client posts a HTTP request to the server containing his/her username and password.

- `Step 2`: Server > Handling sign up

The server receives this request and hashes the password before storing the username and password in your database. This way, if someone gains access to your database they won't see your users' actual passwords.

- `Step 3`: Client > User login

Now your user logs in. He/she provides their username/password and again, this is posted as a HTTP request to the server.

- `Step 4`: Server > Validating login

The server looks up the username in the database, hashes the supplied login password, and compares it to the previously hashed password in the database. If it doesn't check out, we may deny them access by sending a 401 status code and ending the request.

- `Step 5`: Server > Generating access token

If everything checks out, we're going to create an access token, which uniquely identifies the user's session. Still in the server, we do two things with the access token:

Store it in the database associated with that user
Attach it to a response cookie to be returned to the client. Be sure to set an expiration date/time to limit the user's session
Henceforth, the cookies will be attached to every request (and response) made between the client and server.

- `Step 6`: Client > Making page requests

Back on the client side, we are now logged in. Every time the client makes a request for a page that requires authorization (i.e. they need to be logged in), the server obtains the access token from the cookie and checks it against the one in the database associated with that user. If it checks out, access is granted.

[TOP](#cookie-based-authentication)