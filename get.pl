use LWP::Simple;
use Digest::MD5 qw(md5 md5_hex md5_base64);

my $gate = 'http://gateway.marvel.com/v1/public/';
#Parameters change as you see fit. I picked characters and Spidey
my $param = "characters?name=Spider-Man";
#replace with your key from developers.marvel
my $apikey ='YOURKEY123';
#replace with your private key from developers.marvel
my $privatekey = 'YOURPRIVATEKEY123';
# just used an integer for this example
my $timestamp = '1';

#parts of the urls string
my $ts_amp = '&ts=';
my $api_amp = '&apikey=';
my $hash_amp = '&hash=';
my $m = md5_hex($timestamp . $privatekey . $apikey);

my $url = $gate . $param . $ts_amp . $timestamp . $api_amp . $apikey . $hash_amp . $m;
          # ACME boomerang
my $response = get $url;
die 'Error getting $url' unless defined $response;

#print out the response
print $response;
