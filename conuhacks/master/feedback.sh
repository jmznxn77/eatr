#!/bin/bash
curl -H "Authorization: Bearer $2" -d "$3" -d "add_tags=$1"  https://api.clarifai.com/v1/feedback/