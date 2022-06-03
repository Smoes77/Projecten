module.exports.run = async (bot, message, args) => {

    if(!message.member.permissions.has("MANAGE_MESSAGES")) return message.reply("Je hebt geen toestemming om deze command uit te voeren");

    if (!args[0]) return message.reply("Geef een aantal op hoeveel berichten je wilt weghalen.");

    if(parseInt(args[0])){

        var amount = parseInt(args[0]) + 1;

        message.channel.bulkDelete(amount).then(() => { 

            if(parseInt(args[0]) == 1){
                message.channel.send("Ik heb 1 bericht verwijderd.").then(msg => {
                    setTimeout(() => {
                        msg.delete();
                    }, 3000);
                });        

            } else {
                    message.channel.send(`Ik heb ${parseInt(args[0])} berichten verwijderd.`).then(msg => {
                        setTimeout(() => {
                            msg.delete();
                        }, 3000);
                    });    
            }

        }).catch(err => {
            return message.reply("Je mag geen negatief getal geven. Geef een getal groter dan 0.");
        });

    }else{
        return message.reply("Geef een getal op.");
    }

}

module.exports.help = {
    name: "clear",
    category: "admin",
    description: "Verwijderd het aantal berichten wat je opgegeven hebt!"
    
}