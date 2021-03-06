package Dienstplan;

import java.math.BigInteger;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.util.Random;

public class md5 {

	public  static String md5(String text) throws Exception {
		//algorithm to crypt the passwords to md5 hash
		try {
			MessageDigest md5 = MessageDigest.getInstance("MD5");
			md5.reset();
			md5.update(text.getBytes());
			byte[] result = md5.digest();
			
			StringBuffer hex = new StringBuffer();
			for(int i=0; i<result.length; i++) {
				if(result[i] <= 15 && result[i] >= 0) {
					hex.append("0");
				}
				hex.append(Integer.toHexString(0xFF & result[i]));
			}
			return hex.toString();
		}
		catch(NoSuchAlgorithmException e) {
			throw new Exception("md5 error");
		}
	}
	

}
