![](podcast-subscriber-logo.png?raw=true)

# Podcast Subscriber

This isn't really consumer ready yet but I've taken first steps. I'm fully accepting issues or pull requests from anyone who wants to help me make this into something useful for not-Matt. :)

## Basic setup

Gotta replace all the images with your own images.

### RSS Feed Setup
Put your RSS URL in the `RSS_URL` env var.

### iTunes Setup
Put your iTunes URL in the `ITUNES_URL` env var.

### SMS Setup
Twilio account. Get your creds and past into the `TWILIO_*` env vars. Boom done.

### Facebook Setup
It's a pain in the butt.

It involves many steps of approval from Facebook.

Also update config/botman/facebook to have your domains.

Also make sure to set up your `FACEBOOK_URL` env var so the links work.
