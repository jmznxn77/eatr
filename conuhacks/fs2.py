from fatsecret import Fatsecret
import sys
import cgi, cgitb

#cgitb.enable()

def main():

	filename="tags.txt"
	badTags=["no person", "fruit", "food", "nutrition", "confection", "health", "tropical", "bunch", "healthy", "glass", "foam", "alcohol", "pub", "drink", "lager", "sesame", "unhealthy", "fast", "lunch", "mayonnaise", "bird", "poultry", "hen", "animal", "feather", "farm", "nature", "desktop", "wing", "meat", "barbecue", "fillet", "dinner", "vegetable", "pastry", "delicious", "refreshment", "delicious", "homemade", "citrus", "juice", "juicy", "isolated", "desktop", "meal", "plate", "bowl", "cuisine", "cooking", "person", "calcium", "cream", "glass", "cold"]
	consumerkey = "916c5699f1614b4bb2b939a76df609b1"
	consumersecret = "ec94e8fc8be7483f810a81f7cba32c14"

	#read file tags.txt into a list
	f0 = open(filename)
	lines = [line.rstrip('\n') for line in f0]
	f0.close

	#print(lines)

	#remove bad tags from the list
	goodList = [x for x in lines if x not in badTags]

	#print(goodList)

	#write the goodList to a new file tags2.txt
	f1 = open("tags2.txt", "w")
	for item in goodList:
  		f1.write("%s\n" % item)
  	f1.close()

	fs = Fatsecret(consumerkey, consumersecret)
	foods = fs.foods_search(goodList[0], 0, 1)
	
	#print(foods)

	stringFood = str(foods[0]) #top good tag used here
	s=stringFood.replace("u'","\"")  #strip u' 's
	s2=s.replace("\'","\"")   #turn single quotes to double quotes

	#print(s2)

	# Open a file to write our result to, then close it
	f2 = open("guac.json", "w")
	f2.write(s2)
	f2.close()

main()