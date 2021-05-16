

import java.awt.Color;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.ItemEvent;
import java.awt.event.ItemListener;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.Statement;
import java.util.LinkedList;

import javax.swing.JButton;
import javax.swing.JComboBox;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JTextArea;
import javax.swing.JTextField;



public class PPE extends JFrame implements ActionListener, ItemListener{


	//cr�ation des boutons
	JButton boutonCons = new JButton("Consultation");
	JButton boutonDel = new JButton("Delete");
	JButton boutonInser = new JButton("Inserer");
	JButton boutonUpdate = new JButton("Update");
	JButton boutonClear = new JButton("Clear");
	JButton boutonClearStock = new JButton("Effacer stock");
	JButton fournisseur1 = new JButton("commandeFournisseur");
	
	//cr�ation des �l�ments des listes
	String [] Genre = {"Homme", "Femme"};
	String [] optionsCouleurs = {"Rouge", "Bleu", "Vert", "Noir", "Beige"};
	String [] Taille = {"1an-6ans", "7ans-12ans", "13ans-18ans", "Adulte"};
	String [] TypeVetement = {"Chemise","Pantalon","Veste","Robe","Jupe"};
	String [] Fourni = {"Fournisseur1","Fournisseur2","Fournisseur3"};
	
	// Cr�ations des listes d�roulantes
	private JComboBox listeCouleurs = new JComboBox(optionsCouleurs);
	private JComboBox genre = new JComboBox(Genre);
	private JComboBox taille = new JComboBox(Taille);
	private JComboBox typeVetement = new JComboBox(TypeVetement);
	private JComboBox fournisseur = new JComboBox(Fourni);
	
	//Labels
	private JLabel labelPrix = new JLabel("Saisir prix");
	private JLabel labelQte = new JLabel("Saisir une Quantit�");
	private JLabel labelId = new JLabel("Saisir l'id");
	
	//zone de r�sultat
	private JTextArea zoneResultat = new JTextArea(10,30);
	
	
	//zone de saisie
	private JTextField prix = new JTextField(20);
	private JTextField id = new JTextField(20);
	private JTextField qte = new JTextField(20);
	


	private BddAccess refBdd;
	
	public PPE() {
		
//-------cr�ation de la fenetre ------------------------------------------------------
		//titre de la fenetre
		setTitle("fenetre Stock");
		
		//fermeture du processus
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		
		
		// endroit ou apparait la fenetre au d�but
		setLocationRelativeTo(null);
		
		
		// taille de la fenetre
		setSize(600,400);
		
		// visibilit� de la fenetre
		setVisible(true);
		
//---------fin de cr�ation de fenetre -------------------------------------------------
		
		//cr�ation de l'objet panel
		JPanel pan = new JPanel();
		
		//couleur du background
		pan.setBackground(Color.gray);
		
		//associe la fenetre avec le panel
		setContentPane(pan);
		
		//ajout des boutons sur le panel
		pan.add(boutonCons);
		pan.add(boutonDel);
		pan.add(boutonInser);
		pan.add(boutonUpdate);
		pan.add(boutonClear);
		pan.add(boutonClearStock);
		pan.add(labelId);
		pan.add(id);
		pan.add(genre);
		pan.add(typeVetement);
		pan.add(taille);
		pan.add(listeCouleurs);
		pan.add(labelPrix);
		pan.add(prix);
		pan.add(labelQte);
		pan.add(qte);
		pan.add(zoneResultat);
		pan.add(fournisseur1);
		pan.add(fournisseur);
		
		
		
		
		//associe les actions des boutons � cette fenetre
		boutonCons.addActionListener(this);
		boutonDel.addActionListener(this);
		boutonInser.addActionListener(this);
		boutonClear.addActionListener(this);
		boutonUpdate.addActionListener(this);
		boutonClearStock.addActionListener(this);
		genre.addActionListener(this);
		taille.addActionListener(this);
		typeVetement.addActionListener(this);
		listeCouleurs.addActionListener(this);
		prix.addActionListener(this);
		qte.addActionListener(this);
		id.addActionListener(this);
		fournisseur1.addActionListener(this);
		fournisseur.addActionListener(this);

		//associe les items � cette fenetre
		
	// S�lectionne un �l�ment de la liste
	genre.setSelectedIndex(1);
	taille.setSelectedIndex(3);
	typeVetement.setSelectedIndex(3);
	listeCouleurs.setSelectedIndex(4);
	fournisseur.setSelectedIndex(2);
	
	
	


}
	
		@Override
		public void actionPerformed(ActionEvent e) {
			//cr�ation des variables
			String genre1=(String) genre.getSelectedItem();
	 		String taille1=(String) taille.getSelectedItem();
	 		String typeVet=(String) typeVetement.getSelectedItem();
	 		String couleur=(String) listeCouleurs.getSelectedItem();
	 		String Prix= prix.getText();
	 		String Qte= qte.getText();
	 		String Id=id.getText();
			String fournisseur2=(String) fournisseur.getSelectedItem();
	 		
	 		
		 	
	 		//Consultation
		 	if(e.getSource()==boutonCons) {
		 		
		 		refBdd.envoiRequeteSel("SELECT * from stock");
		 		refBdd.rechercheResultatsVersIhm();
		 	}
		 	//Insertion
		 	else if (e.getSource()==boutonInser) {
		 			//Si prix et quantit� ne sont pas vide
		 			if(!Prix.isEmpty() && !Qte.isEmpty()) {
		 		String	req = "INSERT INTO stock (Genre, TypeVet, Taille, Couleur,PrixUnite,QuantiteDispo) VALUES (";
					req = req + "'"+genre1 + "'"+","+ "'"+typeVet + "'"+ ","+ "'"+taille1 +"'"+","+"'"+couleur +"'"+","+"'"+Prix+"'"+","+"'"+Qte+"'"+")";
				
		 		refBdd.envoiRequeteUpdate(req);
		 		zoneResultat.append("votre demande a �t� valid�e\n");
				
		 		}
		 		else {
		 			zoneResultat.append("veuillez entrer un prix et une quantit�\n");
		 		}
		 	}
		 	//Supprimer
		 	else if(e.getSource()== boutonDel){
		 		if(!Id.isEmpty()) {
		 			String	req = "DELETE FROM stock WHERE id="+Id;
					
				
		 		refBdd.envoiRequeteUpdate(req);
		 		zoneResultat.append("votre demande a �t� valid�e\n");
		 		}
		 		else {
		 			zoneResultat.append("Veuillez saisir l'article  � supprimer\n");
		 		}
		 		
		 		
		 	}
		 	//Nettoyer la zone de r�sultat
		 	else if (e.getSource()== boutonClear){
		 		zoneResultat.setText("");
		 		
		 	}
		 	//Supprimer tous les �l�ments de la table de stock
		 	else if (e.getSource()== boutonClearStock){
		 		
		 		
		 		refBdd.envoiRequeteUpdate("DELETE stock.* from stock");
		 		zoneResultat.append("votre demande a �t� valid�e\n");
		 		
		 	}
			else if (e.getSource()== fournisseur1){
				zoneResultat.setText("la commande à été envoyée au : "+fournisseur2);

			}
		 	//Update
		 	/*else if (e.getSource()== boutonUpdate) {
		 			if(!Qte.isEmpty()&& !Id.isEmpty()) {
		 				String req="UPDATE stock SET QuantiteDispo="+Qte+"WHERE id="+Id;
		 				refBdd.envoiRequeteUpdate(req);
		 				zoneResultat.append("votre demande a �t� valid�e\n");
		 			}
		 			else {
		 				zoneResultat.append("veuillez indiquer l'id et la quantit�\n");
		 			}
		 	}*/
		 	else {
		 		
		 	}
		}
		
		// methode de r�f�rence BDD
	public void setRefBdd(BddAccess refBdd) {
		this.refBdd = refBdd;
	}

	@Override
	public void itemStateChanged(ItemEvent e) {
		// TODO Auto-generated method stub
		
	}
	//M�thode pour afficher les r�sultats
	public void afficheZoneResultats(String ligne) {
		// TODO Auto-generated method stub
		zoneResultat.append(ligne);
		
	}


}

