
import sys
from Encryptor import Encryptor

encryptorObj = Encryptor()
jsonData = sys.argv[1]
email = sys.argv[2]

encryptedData = encryptorObj.Encrypt__JSONData(jsonData,email)
print (encryptedData)


    


