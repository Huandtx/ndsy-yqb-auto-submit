#!/usr/bin/env python
#author:huandtx
from selenium import webdriver
import random
from selenium.webdriver.chrome.options import Options
import time

def seeka(url):
	try:	
		chrome_options = Options()
		chrome_options.add_argument("--headless")
		chrome_options.add_argument('--disable-gpu')
		chrome_options.add_argument('--no-sandbox')
		browser=webdriver.Chrome(chrome_options=chrome_options)
		#browser = webdriver.Chrome()
		browser.implicitly_wait(5)
		browser.get(url)
		browser.find_element_by_xpath("/html/body/div[3]/div[2]/button").click()
		time.sleep(3)
		browser.find_element_by_xpath('//*[@id="app"]/div/div/div[1]/section/main/div/div/div/div[19]/div[1]/div[2]').click()
		browser.find_element_by_xpath('//*[@id="app"]/div/div/div[1]/section/main/div/div/div/div[19]/div[2]/div[2]').click()
		browser.find_element_by_xpath('//*[@id="app"]/div/div/div[1]/section/main/div/div/div/div[20]/div[2]/div/div[2]/div[1]').click()
		browser.find_element_by_xpath('//*[@id="app"]/div/div/div[1]/section/main/div/div/div/div[27]/button[3]').click()
	except Exception as e:
		browser.find_element_by_xpath('//*[@id="app"]/div/div/div[1]/section/main/div/div/div/div[27]/button[4]').click()
	time.sleep(3)
	browser.close()
	print("+++++++OK!!!!++++++")
def readl():
	namelist=[]
	file=open("/home/www/htdocs/name.txt")
	while 1:
		line = file.readline()
		if not line:
			break
		#seeka(line)
		namelist.append(line.strip("\n"))
		time.sleep(1)
	file.close()
	random.shuffle(namelist)
	for i in namelist:
		time.sleep(5)
		seeka(i)
		time.sleep(10)

if __name__=='__main__':
	readl()
