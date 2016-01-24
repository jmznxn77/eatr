#takes command line arg, searches database and writes to 


from fatsecret import Fatsecret
import sys
import cgi, cgitb

cgitb.enable()

def main():

	filename="tags.txt"
	badTags=["no person", "fruit", "food", "nutrition", "confection", "health", "tropical", "bunch", "healthy", "glass", "foam", "alcohol", "pub", "drink", "lager", "sesame", "unhealthy", "fast", "lunch", "mayonnaise", "bird", "poultry", "hen", "animal", "feather", "farm", "nature", "desktop", "wing", "meat", "barbecue", "fillet", "dinner", "vegetable", "pastry", "delicious", "refreshment", "delicious", "homemade", "citrus", "juice", "juicy", "isolated", "desktop", "meal", "plate", "bowl", "cuisine", "cooking", "person", "calcium", "cream", "glass", "cold", "closeup", "diet", "epicure", "close", "skin", "texture", "breakfast", "half", "moon", "grow", "one", "old", "wood", "stick"]

	f0 = open(filename)
	lines = [line.rstrip('\n') for line in f0]
	f0.close

	#print(lines)

	#remove bad tags from the list
	goodList = [x for x in lines if x not in badTags]

	consumerkey = "916c5699f1614b4bb2b939a76df609b1"
	consumersecret = "ec94e8fc8be7483f810a81f7cba32c14"

	fs = Fatsecret(consumerkey, consumersecret)
	#print(goodList)
	try:
	  	foods = fs.foods_search(goodList[0], 0, 1)
	except Exception: 
		print("titty tats")
		foods = str(fs.foods_search("chicken tenders", 0, 1)[0])
	  	pass
	
	if isinstance(foods, list):
		stringFood = str(foods[0]) #first entry
	else:
		stringFood = str(foods) 

	s=stringFood.replace("u'","\"")  #strip u' 's
	s2=s.replace("\'","\"")   #turn single quotes to double quotes

	# Open a file to write our shit to 
	fo = open("guac.json", "w")
	fo.write(s2)

	# Close opend file
	fo.close()

main()