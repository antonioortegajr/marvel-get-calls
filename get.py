
import urllib2
import hashlib

gate = 'http://gateway.marvel.com/v1/public/'
#Parameters change as you see fit. I picked charachter and Spidey
param = "characters?name=Spider-Man"
#replace with your key from developers.marvel
apikey ='YOURKEY123'
#replace with your private key from developers.marvel
privatekey = 'YOURPRIVATEKEY123'
# just used an integer for this example
timestamp = '1'

#parts of the urls string
ts_amp = '&ts='
api_amp = '&apikey='
hash_amp = '&hash='

#create hash
m = hashlib.md5(timestamp + privatekey + apikey.encode('utf-8')).hexdigest()

#start building the url string
url = gate + param + ts_amp + timestamp + api_amp + apikey + hash_amp + m

response = urllib2.urlopen(url).read()

#the reposnse. should look like the docs at developers.marvel
print response
