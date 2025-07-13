import sys
from Encryptor import Encryptor

encryptorObj = Encryptor()
user = sys.argv[1]

key = encryptorObj.Generate__Key()
userKey = encryptorObj.Store_Key(user)

print(userKey)