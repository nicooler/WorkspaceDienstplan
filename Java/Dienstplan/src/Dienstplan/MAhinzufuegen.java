package Dienstplan;

/*
 * 
 */

import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.ResultSet;
import java.sql.SQLException;

import javax.swing.DefaultComboBoxModel;
import javax.swing.JButton;
import javax.swing.JComboBox;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JTextField;
import javax.swing.border.EmptyBorder;
import javax.swing.JSpinner;
import javax.swing.SpinnerNumberModel;
import javax.swing.SwingConstants;

public class MAhinzufuegen extends JFrame {
	
	private JPanel contentPane;
	private JTextField txtVorname;
	private JTextField txtNachname;
	private JTextField txtStrasse;
	private JTextField txtOrt;
	private JTextField txtGebDat;
	private JTextField txtTelefonNr;
	private JTextField txtBeschaeftigungsgrad;
	
	

	private JTextField txtJahr;
	private JSpinner spinnerMonat;
	private JSpinner spinnerTag;
	private JTextField txtBenutzername;
	private JTextField txtPasswort;
	private JTextField txtRolle;

	public MAhinzufuegen(){
		
		setTitle("Mitarbeiter hinzufuegen");
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 545, 475);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		contentPane.setLayout(null);
		
		
		//buttons
		JButton maHinzufuegen = new JButton("Hinzufuegen");
		maHinzufuegen.addActionListener(new ActionListener(){
		public void actionPerformed(ActionEvent e){
			
			try {
				addworker();
			} catch (Exception e1) {
				e1.printStackTrace();
			}
			
			
		}});
		
		JButton btnZurueck = new JButton("Zurueck");
		btnZurueck.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				
				Main main;
				try {
					main = new Main();
					main.setVisible(true);
					setVisible(false);
				} catch (SQLException e1) {
					e1.printStackTrace();
				}
			}
		});
		btnZurueck.setBounds(56, 369, 89, 23);
		contentPane.add(btnZurueck);
		
		maHinzufuegen.setBounds(277, 369, 157, 23);
		contentPane.add(maHinzufuegen);	
		
		
		//Beschriftung 
		JLabel lblVorname = new JLabel("Vorname:");
		lblVorname.setBounds(10, 85, 46, 14);
		contentPane.add(lblVorname);
		
		JLabel lblNachname = new JLabel("Nachname:");
		lblNachname.setBounds(10, 110, 99, 14);
		contentPane.add(lblNachname);
		
		JLabel lblStrasse = new JLabel("Strasse:");
		lblStrasse.setBounds(10, 135, 71, 14);
		contentPane.add(lblStrasse);
		
	    JLabel lblGebDat = new JLabel("Ort:"); 
		lblGebDat.setBounds(10, 160, 71, 14);
		contentPane.add(lblGebDat);
		
		JLabel lblGeburtsdatum = new JLabel("Geburtsdatum:");
		lblGeburtsdatum.setBounds(10, 185, 99, 14);
		contentPane.add(lblGeburtsdatum);
		
		JLabel lblTelefonNr = new JLabel("Telefon:");
		lblTelefonNr.setBounds(10, 210, 71, 14);
		contentPane.add(lblTelefonNr);
		
		JLabel lblBeschaeftigungsgrad = new JLabel("Beschaeftigungsgrad:");
		lblBeschaeftigungsgrad.setBounds(10, 235, 121, 14);
		contentPane.add(lblBeschaeftigungsgrad);
		
		JLabel lblBenutzername = new JLabel("Benutzername:");
		lblBenutzername.setBounds(10, 260, 121, 14);
		contentPane.add(lblBenutzername);
		
		JLabel lblPasswort = new JLabel("Passwort:");
		lblPasswort.setBounds(10, 285, 99, 14);
		contentPane.add(lblPasswort);
		
		JLabel lblRolle = new JLabel("Rolle:");
		lblRolle.setBounds(10, 310, 46, 14);
		contentPane.add(lblRolle);
		
		
		//Textfelder
		txtVorname = new JTextField();
		txtVorname.setBounds(152, 82, 313, 20);
		contentPane.add(txtVorname);
		txtVorname.setColumns(10);
		
		txtNachname = new JTextField();
		txtNachname.setBounds(152, 107, 313, 20);
		contentPane.add(txtNachname);
		txtNachname.setColumns(10);
		
		txtTelefonNr = new JTextField();
		txtTelefonNr.setBounds(152, 207, 313, 20);
		contentPane.add(txtTelefonNr);
		txtTelefonNr.setColumns(10);
		
		txtBeschaeftigungsgrad = new JTextField();
		txtBeschaeftigungsgrad.setBounds(152, 232, 313, 20);
		contentPane.add(txtBeschaeftigungsgrad);
		txtBeschaeftigungsgrad.setColumns(10);
		
		txtStrasse = new JTextField();
		txtStrasse.setColumns(10);
		txtStrasse.setBounds(152, 132, 313, 20);
		contentPane.add(txtStrasse);
		
		txtOrt = new JTextField();
		txtOrt.setColumns(10);
		txtOrt.setBounds(152, 157, 313, 20);
		contentPane.add(txtOrt);
		
		txtBenutzername = new JTextField();
		txtBenutzername.setBounds(152, 257, 313, 20);
		contentPane.add(txtBenutzername);
		txtBenutzername.setColumns(10);
		
		txtPasswort = new JTextField();
		txtPasswort.setBounds(152, 282, 313, 20);
		contentPane.add(txtPasswort);
		txtPasswort.setColumns(10);
		
		txtRolle = new JTextField();
		txtRolle.setBounds(152, 307, 313, 20);
		contentPane.add(txtRolle);
		txtRolle.setColumns(10);
		
		
		//Datum mit JSpinner
		spinnerMonat = new JSpinner();
		spinnerMonat.setModel(new SpinnerNumberModel(1, 1, 12, 1));
		spinnerMonat.setBounds(276, 182, 46, 20);
		contentPane.add(spinnerMonat);
		
		JLabel lblMonat = new JLabel("Monat");
		lblMonat.setBounds(332, 185, 59, 14);
		contentPane.add(lblMonat);
		
		spinnerTag = new JSpinner();
		spinnerTag.setModel(new SpinnerNumberModel(1, 1, 31, 1));
		spinnerTag.setBounds(388, 182, 46, 20);
		contentPane.add(spinnerTag);
		
		JLabel lblTag = new JLabel("Tag");
		lblTag.setBounds(444, 185, 33, 14);
		contentPane.add(lblTag);
		
		txtJahr = new JTextField();
		txtJahr.setHorizontalAlignment(SwingConstants.RIGHT);
		txtJahr.setBounds(152, 182, 71, 20);
		contentPane.add(txtJahr);
		txtJahr.setColumns(10);
		
		JLabel lblJahr = new JLabel("Jahr");
		lblJahr.setBounds(233, 185, 33, 14);
		contentPane.add(lblJahr);
		

		

		

		
		
	
	setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	setVisible(true);
	}
	
public void addworker() throws Exception{
		
	/*Autor Dominik Witka
	 * 
	 */
	
		try{
		
		DatabaseConnection.getConnection();
		java.sql.Statement st = DatabaseConnection.st;
		
		
		String day = "";
		String month = "";
		//wir brauchen eine zweistellige zahl bei monat und tag
		if ((int)spinnerMonat.getValue() < 10) month ="0" + spinnerMonat.getValue(); else month = spinnerMonat.getValue()+""; 
		if ((int)spinnerTag.getValue() < 10) day ="0" + spinnerTag.getValue(); else day = spinnerTag.getValue()+"";
		
		// lesen der textfelder
		String WForename = txtVorname.getText();
		String WSurename = txtNachname.getText();
		String WStreet = txtStrasse.getText();
		String WCity = txtOrt.getText();
		String WBirthday = txtJahr.getText() + "-" + month + "-" + day;
		String WPhone = txtTelefonNr.getText();
		String WActivitylvl = txtBeschaeftigungsgrad.getText();
		String WUsername = txtBenutzername.getText();
		String WPassword = md5.md5(txtPasswort.getText());
		String WRole = txtRolle.getText();
		
	

		// schreiben der sql anweisung "mitarbeiteranlegen"
		String sqlInsert = "CALL MitarbeiterAnlegen" + "('" + WForename +"','" + WSurename +"','" + WStreet +"','" + WCity +"','" + WBirthday +"','" + WPhone +"','" + 
				WActivitylvl +"','" + WUsername +"','" + WPassword +"','" + WRole + "');";

		
		
		//sql anweisung senden
		st.executeUpdate(sqlInsert);
		 st.close(); 
		
		 // zurücksetzen der daten damit nicht 2x angelegt werden kann
		 	spinnerMonat.setValue(1);
		 	spinnerTag.setValue(1);
		 	txtVorname.setText("");
		 	txtNachname.setText("");
		 	txtStrasse.setText("");
		 	txtOrt.setText("");
		 	txtJahr.setText("");
		 	txtTelefonNr.setText("");
		 	txtBeschaeftigungsgrad.setText("");
		 	txtBenutzername.setText("");
		 	txtPasswort.setText("");
		 	txtBenutzername.setText("");
		 
		 
		}
		catch (Exception ex) {
	        JOptionPane.showMessageDialog(null, "Beim Anlegen ist ein Fehler aufgetreten.","Information", JOptionPane.INFORMATION_MESSAGE); 
	            Main main = new Main(); 
	            setVisible(false); 
	        }
		

	
	}

}


