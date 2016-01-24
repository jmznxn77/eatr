#!/bin/bash
foodItem="$1"

curl -H "Content-Type: application/json" -d '{"q":'$foodItem',"max":"5","sort":"r","offset":"0"}' TYS7W8R5l09VQJnfBcf4zlXFCt802yd0UflYzPQI@api.nal.usda.gov/ndb/search > topResult.json
