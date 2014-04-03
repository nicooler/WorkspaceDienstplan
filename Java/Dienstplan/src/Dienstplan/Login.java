/*
 * Erstellt von Dominik Witka am 02.04.2014
 * 
 */

package Dienstplan;

import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyAdapter;
import java.awt.event.KeyEvent;
import java.sql.ResultSet;

import javax.swing.*;

import Dienstplan.md5;


public class Login extends JFrame {
	private JTextField txtUser;
	private JPasswordField passwordField;
	
	static ResultSet rs; 
	static String user2; 
	static java.sql.Statement st;


	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					Login frame = new Login();
					frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}


	public Login() {
		
		setTitle("Dienstplan Login");
		setResizable(false);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 402, 382);
		getContentPane().setLayout(null);
		
		JLabel lblUser = new JLabel("User-ID:");
		lblUser.setFont(new Font("Tahoma", Font.BOLD, 13));
		lblUser.setForeground(Color.BLACK);
		lblUser.setBackground(Color.WHITE);
		lblUser.setBounds(112, 102, 73, 14);
		getContentPane().add(lblUser);
		
		JLabel lblPassword = new JLabel("Password:");
		lblPassword.setBackground(Color.WHITE);
		lblPassword.setFont(new Font("Tahoma", Font.BOLD, 13));
		lblPassword.setForeground(Color.BLACK);
		lblPassword.setBounds(112, 165, 73, 14);
		getContentPane().add(lblPassword);
		
		txtUser = new JTextField();
		txtUser.setBounds(206, 100, 86, 20);
		getContentPane().add(txtUser);
		txtUser.setColumns(10);
		
		final JButton btnLogin = new JButton("Login");
		btnLogin.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				log();
			}
		});
		btnLogin.setBounds(206, 214, 89, 23);
		getContentPane().add(btnLogin);
		
		JButton btnExit = new JButton("Exit");
		btnExit.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent arg0) {
				System.exit(0);}			
		});
		btnExit.setBounds(206, 267, 66, 24);
		getContentPane().add(btnExit);
		
		passwordField = new JPasswordField();
		passwordField.addKeyListener(new KeyAdapter() {
			@Override
			public void keyReleased(KeyEvent e) {
				if(e.getKeyChar() == KeyEvent.VK_ENTER) {
					btnLogin.doClick();
				}
			}
		});
		passwordField.setBounds(206, 163, 86, 20);
		getContentPane().add(passwordField);
		

	}
	
		public void log(){
			//variables
			String password = "";
			String user = txtUser.getText();
			 char[] pwd = passwordField.getPassword();
				
				for(int i=0; i<pwd.length; i++) {
					password += pwd[i];
				}
			if(user.length() == 0 || password.length() == 0)
			{
				JOptionPane.showMessageDialog(null, "Please insert user ID and password.", "Information", JOptionPane.INFORMATION_MESSAGE);	
			}
			else {
			try{
		        DatabaseConnection.getConnection();
		        java.sql.Statement st = DatabaseConnection.st;
		        
		        
				String hpassword = md5.md5(password);
		        
		        //creating sql statement and executing it to the resultset 
		        String sql = "select Benutzername, Passwort from Account where Benutzername = "+user+" and Passwort = '"+hpassword+"'"; 
		        rs = st.executeQuery(sql);
		        if(rs.next()!= false) { 
		        	//if user found, opening the main frame 
		            Main main = new Main(); 
		        } 
		        else { //if wrong password or username 
		            JOptionPane.showMessageDialog(null, "Wrong User-ID or Password","Information", JOptionPane.INFORMATION_MESSAGE); 
		            Login frame = new Login(); 
		            frame.setVisible(true); 
		        } 
		        st.close(); 
		        rs.close();
		        }
		        catch (Exception ex) {
		        	JOptionPane.showMessageDialog(null, "There is an error with your database connection.","Error", JOptionPane.INFORMATION_MESSAGE); 
		        }
		        
		        setVisible(false);
		    }    
		}
	}


