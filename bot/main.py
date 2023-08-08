from requests import get
import time
import datetime
import json

with open("config.json") as f:
    config = json.load(f)

site = str(config.get("site"))
key = str(config.get("key"))
cookie = str(config.get("cookie"))
groupid = str(config.get("groupid"))

def log(text):
    print(f"[{datetime.datetime.utcfromtimestamp(time.time()).strftime('%H:%M:%S')}] {text}")

while True:
    try: 
        r = get(f'https://economy.roblox.com/v1/groups/{groupid}/revenue/summary/day', cookies={'.ROBLOSECURITY': cookie})
        pending = r.json()['pendingRobux']
        log(f"Pending -> {pending}")
        r = get(f'https://economy.roblox.com/v1/groups/{groupid}/currency', cookies={'.ROBLOSECURITY': cookie})
        available = r.json()['robux']
        log(f"Available -> {available}")
        r = get(f'https://{site}/receive.php/?key={key}&pending={pending}&available={available}')
        time.sleep(60)
    except:
        log("Ratelimited")
        time.sleep(120)