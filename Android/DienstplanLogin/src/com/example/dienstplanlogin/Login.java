package com.example.dienstplanlogin;
/*
Author: Nicolas Balss , 
Userstory: 320 Als Mitarbeiter möchte ich mich über mein Android smartphone einloggen 
Version: 1.0

/**/
import android.os.Bundle;
import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.view.Menu;

import android.graphics.Color;


import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;
public class Login extends Activity {

	 private EditText  username=null;
	   private EditText  password=null;
	   private TextView attempts;
	   private Button login;
	   int counter = 3;
	   @Override
	   protected void onCreate(Bundle savedInstanceState) {
	      super.onCreate(savedInstanceState);
	      setContentView(R.layout.activity_login);
	      username = (EditText)findViewById(R.id.editText1);
	      password = (EditText)findViewById(R.id.editText2);
	      attempts = (TextView)findViewById(R.id.textView5);
	      attempts.setText(Integer.toString(counter));
	      login = (Button)findViewById(R.id.button1);
	   }

	   public void login(View view){
		   final Context context = this;
	      if(username.getText().toString().equals("a") && 
	      password.getText().toString().equals("a")){
	      Toast.makeText(getApplicationContext(), "Redirecting...", 
	      Toast.LENGTH_SHORT).show();
	      Intent intent = new Intent(context, Backend.class);
          startActivity(intent);
	   }	
	   else{
	      Toast.makeText(getApplicationContext(), "Wrong Credentials",
	      Toast.LENGTH_SHORT).show();
	      attempts.setBackgroundColor(Color.RED);	
	      counter--;
	      attempts.setText(Integer.toString(counter));
	      if(counter==0){
	         login.setEnabled(false);
	      }

	   }

	}
	   @Override
	   public boolean onCreateOptionsMenu(Menu menu) {
	      // Inflate the menu; this adds items to the action bar if it is present.
	      getMenuInflater().inflate(R.menu.login, menu);
	      return true;
	   }
}
