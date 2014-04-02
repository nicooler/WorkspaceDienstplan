package guis;

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

public class MAverwalten extends JFrame {
	
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

	public MAverwalten(){
		
		setTitle("Mitarbeiter verwalten");
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 545, 475);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		contentPane.setLayout(null);
		
		JButton maHinzufuegen = new JButton("Mitarbeiter loeschen");
		maHinzufuegen.addActionListener(new ActionListener(){
		public void actionPerformed(ActionEvent e){}});
		
		maHinzufuegen.setBounds(33, 370, 157, 23);
		contentPane.add(maHinzufuegen);	
		
		JButton speichern = new JButton("Speichern");
		speichern.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e){}});
		
		speichern.setBounds(320, 270, 145, 23);
		contentPane.add(speichern);
		
		
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
		lblGeburtsdatum.setBounds(10, 185, 46, 14);
		contentPane.add(lblGeburtsdatum);
		
		JLabel lblTelefonNr = new JLabel("Telefon:");
		lblTelefonNr.setBounds(10, 210, 71, 14);
		contentPane.add(lblTelefonNr);
		
		JLabel lblBeschaeftigungsgrad = new JLabel("Beschaeftigungsgrad:");
		lblBeschaeftigungsgrad.setBounds(10, 235, 71, 14);
		contentPane.add(lblBeschaeftigungsgrad);
		
		
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

}
