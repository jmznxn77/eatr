#!/bin/bash
curl -X POST -d "grant_type=client_credentials" -d "client_id=rQOOXUCVN45ayJjr8sSsZ1SYEOor_2LinCBRWS6-" -d "client_secret=o-Fo2JAwj7BYYI5zoHjZJwujO_I9A31-PlsOyTH_" https://api.clarifai.com/v1/token/ > access.json
echo 'hello' 
