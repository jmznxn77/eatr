#!/bin/bash
curl -H "Authorization: Bearer $1" -F "$2" https://api.clarifai.com/v1/tag/ > tags.json
