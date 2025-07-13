import sys
from Encryptor import Encryptor

encryptorObj = Encryptor()
user = sys.argv[1]

userKey = encryptorObj.Get__Key(user)

print(userKey)