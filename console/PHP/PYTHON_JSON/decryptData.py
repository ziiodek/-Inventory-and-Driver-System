import sys
from Encryptor import Encryptor

encryptorObj = Encryptor()
jsonData = sys.argv[1]
email = sys.argv[2]

decryptedData = encryptorObj.Decrypt__Data(jsonData,email)
print (decryptedData)