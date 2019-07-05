# In conclusion

This method of creating POCO objects, and POCO object providers is great for custom use in the application. Just create an object, and reuse it.

Using them for special scenarios is great, BUT, we already have our Entity classes – wouldn’t it be great to generate POCO objects automatically based on them, instead of writing a lot of wiring around them?

For that we’ve created the POCO Creator class which we will discuss in a future post.

This method of creating POCOS that I’ve demonstrated in this post is the basis of using POCO, and it’ll be the fallback position whenever you need to do something special, and specific (Which is in more cases then you think) The other method that I’ll show in the future post is for the general cases, in which we need a POCO object that looks exactly the same as our entities.

Next I recommend that you read, Poco Creator–automatically create poco object based on entities, (T4 Templates)