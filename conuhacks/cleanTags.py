def main():
	
	filename="tags.txt"
	badTags=["no person", "fruit", "food", "nutrition", "confection", "health", "tropical", "bunch", "healthy", "glass", "foam", "alcohol", "pub", "drink", "lager", "sesame", "unhealthy", "fast", "lunch", "mayonnaise", "bird", "poultry", "hen", "animal", "feather", "farm", "nature", "desktop", "wing", "meat", "barbecue", "fillet", "dinner", "vegetable", "pastry", "delicious", "refreshment", "delicious", "homemade", "citrus", "juice", "juicy", "isolated", "desktop", "meal", "plate", "bowl", "cuisine", "cooking", "person", "calcium", "cream", "glass", "cold"]
	lines = [line.rstrip('\n') for line in open(filename)]
	
	goodList = [x for x in lines if x not in badTags]
	
	print(goodList)

	file = open("tags2.txt", "w")

	for item in goodList:
  		file.write("%s\n" % item)

main()