#!/bin/bash
foodItem="$1"

curl -H "Content-Type:application/json" -d '{"ndbno":"'"$foodItem"'","type":"b"}' TYS7W8R5l09VQJnfBcf4zlXFCt802yd0UflYzPQI@api.nal.usda.gov/ndb/reports > foodInfo.json