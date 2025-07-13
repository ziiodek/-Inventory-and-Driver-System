
from cryptography.fernet import Fernet
import json
import base64
class Encryptor:

    def __init__(self):
        self.jsonString = {}

    def Generate__Key(self):
        key = Fernet.generate_key()
        self.key = key
        #print(self.key)
        return self.key
    
    def Store_Key(self,EMAIL):
        with open("../jsonFiles/users.json","r") as j:
            self.fileData = json.load(j)
        self.fileData[EMAIL] = self.key.decode()
        #print(self.fileData)
        j.close()
        with open("../jsonFiles/users.json","w") as j:
            json.dump(self.fileData,j)
        j.close()
        return self.fileData

    def Get__Key(self,EMAIL):
        with open("../jsonFiles/users.json","r") as j:
            self.fileData = json.load(j)
        return self.fileData[EMAIL].encode()

    def Encrypt__JSONData(self,JSON_DATA,EMAIL):
        data = json.loads(JSON_DATA)
        self.key = self.Get__Key(EMAIL)
        f = Fernet(self.key)
        for (k,v) in data.items():
            token = f.encrypt(v.encode())
            encoded = base64.b64encode(token)
            self.jsonString[k] = str(encoded,encoding='ascii')
        return json.dumps(self.jsonString) 

    def Decrypt__Data(self,JSON_DATA,EMAIL):
        data = json.loads(JSON_DATA)
        self.key = self.Get__Key(EMAIL)
        f = Fernet(self.key)
        for (k,v) in data.items():
            decoded = base64.b64decode(v)
            token = f.decrypt(decoded.decode())
            self.jsonString[k] = token.decode()
        return json.dumps(self.jsonString)