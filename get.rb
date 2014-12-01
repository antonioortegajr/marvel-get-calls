require 'net/http'
require 'digest/md5'

#parts of the urls string
api_amp = '&apikey='
hash_amp = '&hash='
ts_amp = '&ts='

#replace with your key from developers.marvel
marvel_api_key = 'YOURKEY123'

#replace with your private key from developers.marvel
marvel_private_key = 'YOURPRIVATEKEY123'

#Timestamp, just used an integer for this example
ts = '1'

#Parameters change as you see fit. I picked characters and Spidey
param = 'characters?name=Spider-Man'

#beginning of endpoint. change if needed
endpoint = 'http://gateway.marvel.com/v1/public/'

#start building the url string
url = endpoint.concat(param)
url = url.concat(ts_amp)
url = url.concat(ts)
url = url.concat(api_amp)
url = url.concat(marvel_api_key)

#create hash
hash = ts.concat(marvel_private_key)
hash = hash.concat(marvel_api_key)

digest = Digest::MD5.hexdigest(hash)


#Build the rest of the url string for this call
url = url.concat(hash_amp)
url = url.concat(digest)


#prefom a GET
resp = Net::HTTP.get_response(URI.parse(url))

resp_text = resp.body

#the reposnse. should look like the docs at developers.marvel

puts resp_text
