# Podcast Subscriber

This isn't really consumer ready yet but I've taken first steps.

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

It involves many steps of approval from Facebook. I am writing this readme and can't even get them to approve the pages_messaging_subscriptions permission you need to make this fully work. Good luck.

Also make sure to set up your `FACEBOOK_URL` env var so the links work.
